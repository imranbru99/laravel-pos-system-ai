# Database

Run `php artisan migrate`. Core tables: tenants, users, companies, branches, branch_user, tenant_modules, products, sales, sale_items, inventory_movements, audit_logs, plus Laravel cache/jobs/sessions/password-reset tables.

Money uses integer minor units. Initial BDT workflow uses two decimal places. Arbitrary currency switching and currency-specific minor units are not implemented. Prices are limited to 100,000,000 minor units; quantity to 10,000 per sale line, up to 100 lines. Server integer products remain within 64-bit integer bounds under these limits. Tax is exclusive, in basis points (500 = 5%). Each line tax is half-up: `intdiv(net * basisPoints + 5000, 10000)`. Discounts, inclusive and compound taxes are pending.

Stock is SUM(quantity) by tenant/branch/product. Positive receipts and negative sale issues form the ledger. No mutable stock quantity on products. Corrections should be future compensating movements, never editing prior movements. ORM model hooks reject ledger/audit mutation; a database administrator or raw SQL bypass can still alter records. Database-level immutable-role enforcement is future hardening.

Sales snapshot names/prices/tax/currency, tendered cash and total. No double-entry journals or independent provider payment records yet. Unique tenant/client ID plus request hash protects replay. Retrying a changed payload returns 409. Unique tenant/SKU and tenant/slug constraints provide database enforcement.
