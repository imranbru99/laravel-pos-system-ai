import './bootstrap';
const theme = document.getElementById('theme');
if (localStorage.getItem('theme') === 'dark') document.documentElement.dataset.theme = 'dark';
theme?.addEventListener('click', () => {
    const next = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
    document.documentElement.dataset.theme = next; localStorage.setItem('theme', next);
});
document.getElementById('print')?.addEventListener('click', () => window.print());
const root = document.getElementById('pos');
if (root) {
    const products = JSON.parse(root.dataset.products);
    const cart = new Map();
    let clientId = crypto.randomUUID(), pending = null, busy = false;
    const el = id => document.getElementById(id);
    const money = value => `${root.dataset.currency} ${(value / 100).toFixed(2)}`;
    const node = (tag, text, cls) => { const n = document.createElement(tag); n.textContent = text; if (cls) n.className = cls; return n; };
    function drawProducts() {
        el('product-grid').replaceChildren();
        const q = el('search').value.toLowerCase();
        products.filter(p => p.name.toLowerCase().includes(q) || p.sku.toLowerCase().includes(q)).forEach(p => {
            const b = node('button', '', 'product');
            b.append(node('span', p.sku, 'eyebrow'), node('strong', p.name), node('span', money(p.price_minor)));
            b.addEventListener('click', () => { if (pending || busy) return; cart.set(p.id, (cart.get(p.id) || 0) + 1); drawCart(); });
            el('product-grid').append(b);
        });
    }
    function totals() {
        let subtotal = 0, tax = 0;
        for (const [id, quantity] of cart) { const p = products.find(p => p.id === id); const net = p.price_minor * quantity; subtotal += net; tax += Number((BigInt(net) * BigInt(p.tax_bps) + 5000n) / 10000n); }
        return {subtotal, tax, total: subtotal + tax};
    }
    function drawCart() {
        el('cart-items').replaceChildren();
        if (!cart.size) el('cart-items').append(node('p', 'Your next sale starts here. Choose a product to get going.', 'empty'));
        for (const [id, quantity] of cart) {
            const p = products.find(p => p.id === id), row = node('div', '', 'cart-row');
            const remove = node('button', '−', 'quiet'); remove.setAttribute('aria-label', `Remove one ${p.name}`);
            remove.disabled = Boolean(pending || busy);
            remove.onclick = () => { quantity > 1 ? cart.set(id, quantity - 1) : cart.delete(id); drawCart(); };
            row.append(node('span', `${p.name} × ${quantity}`), remove); el('cart-items').append(row);
        }
        const t = totals(); ['subtotal','tax','total'].forEach(key => el(key).textContent = money(t[key]));
        el('pay').disabled = busy || !cart.size || !navigator.onLine;
        el('branch').disabled = Boolean(pending || busy); el('tendered').disabled = Boolean(pending || busy);
        el('clear').disabled = Boolean(pending || busy);
    }
    el('search').addEventListener('input', drawProducts);
    el('search').addEventListener('keydown', e => {
        if (e.key !== 'Enter' || pending || busy) return;
        const p = products.find(p => p.sku.toLowerCase() === el('search').value.toLowerCase());
        if (p) { cart.set(p.id, (cart.get(p.id) || 0) + 1); el('search').value = ''; drawProducts(); drawCart(); }
    });
    el('clear').onclick = () => { if (pending || busy) return; cart.clear(); clientId = crypto.randomUUID(); drawCart(); };
    el('pay').onclick = async () => {
        if (busy || !cart.size || !navigator.onLine) return;
        const tendered = Number(el('tendered').value);
        if (!Number.isSafeInteger(tendered) || tendered < totals().total) { el('pos-message').textContent = 'Enter enough cash in whole minor units.'; return; }
        pending ||= {client_id: clientId, branch_id: Number(el('branch').value), tendered_minor: tendered, items: [...cart].map(([product_id,quantity]) => ({product_id,quantity}))};
        busy = true; drawCart(); el('pos-message').textContent = 'Completing sale…';
        try {
            const response = await fetch('/checkout', {method:'POST', headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}, body:JSON.stringify(pending)});
            const data = await response.json();
            if (!response.ok) {
                if (response.status >= 400 && response.status < 500 && response.status !== 409) pending = null;
                throw new Error(Object.values(data.errors || {}).flat().join(' ') || data.message || 'Checkout failed.');
            }
            const link = node('a', `Sale #${data.id} complete. Open receipt →`); link.href = data.receipt;
            el('pos-message').replaceChildren(link); pending = null; clientId = crypto.randomUUID(); cart.clear(); el('tendered').value = '';
        } catch (error) { el('pos-message').textContent = error.message + (pending ? ' Keep this page open and retry with the same transaction ID.' : ''); }
        finally { busy = false; drawCart(); }
    };
    const connection = () => { el('connection').textContent = navigator.onLine ? 'Online checkout required' : 'Offline · checkout unavailable'; drawCart(); };
    window.addEventListener('online', connection); window.addEventListener('offline', connection);
    window.addEventListener('beforeunload', e => { if (pending) { e.preventDefault(); e.returnValue = ''; } });
    drawProducts(); connection();
}
