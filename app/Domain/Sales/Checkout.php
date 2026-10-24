<?php

namespace App\Domain\Sales;

use App\Domain\Modules\ModuleManager;
use App\Domain\Tenancy\TenantContext;
use App\Models\AuditLog;
use App\Models\Branch;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class Checkout
{
    public function execute(User $user, array $data): Sale
    {
        return DB::transaction(function () use ($user, $data) {
            $tenant = Tenant::whereKey(app(TenantContext::class)->id())->lockForUpdate()->firstOrFail();
            abort_unless($tenant->active && app(ModuleManager::class)->isEnabled('sales'), 403);
            $branch = Branch::findOrFail($data['branch_id']);
            abort_unless($user->canUseBranch($branch->id), 403);
            $hash = hash('sha256', json_encode($data));
            $existing = Sale::where('client_id', $data['client_id'])->first();
            if ($existing) {
                abort_unless($existing->request_hash === $hash, 409, 'This transaction ID was already used with different data.');

                return $existing;
            }
            $lines = [];
            $subtotal = 0;
            $tax = 0;
            $seen = [];
            foreach ($data['items'] as $line) {
                if (isset($seen[$line['product_id']])) {
                    throw ValidationException::withMessages(['items' => 'Combine duplicate products into one line.']);
                }
                $seen[$line['product_id']] = true;
                $product = Product::where('active', true)->findOrFail($line['product_id']);
                $stock = (int) InventoryMovement::where('branch_id', $branch->id)->where('product_id', $product->id)->sum('quantity');
                if ($stock < $line['quantity']) {
                    throw ValidationException::withMessages(['items' => "Insufficient stock: {$product->name}."]);
                }
                $net = (int) $product->price_minor * $line['quantity'];
                $lineTax = intdiv($net * (int) $product->tax_bps + 5000, 10000);
                $subtotal += $net;
                $tax += $lineTax;
                $lines[] = ['product_id' => $product->id, 'name' => $product->name, 'quantity' => $line['quantity'], 'price_minor' => $product->price_minor, 'tax_minor' => $lineTax];
            }
            $total = $subtotal + $tax;
            if ($data['tendered_minor'] < $total) {
                throw ValidationException::withMessages(['tendered_minor' => 'Cash tendered is below the total.']);
            }
            $sale = Sale::create(['branch_id' => $branch->id, 'user_id' => $user->id, 'client_id' => $data['client_id'], 'request_hash' => $hash, 'subtotal_minor' => $subtotal, 'tax_minor' => $tax, 'total_minor' => $total, 'tendered_minor' => $data['tendered_minor'], 'currency' => $tenant->currency]);
            foreach ($lines as $line) {
                SaleItem::create(['sale_id' => $sale->id] + $line);
                InventoryMovement::create(['branch_id' => $branch->id, 'product_id' => $line['product_id'], 'quantity' => -$line['quantity'], 'reason' => 'sale', 'user_id' => $user->id, 'sale_id' => $sale->id, 'created_at' => now()]);
            }
            AuditLog::create(['user_id' => $user->id, 'action' => 'sale.completed', 'context' => json_encode(['sale_id' => $sale->id]), 'created_at' => now()]);

            return $sale;
        }, 3);
    }
}
