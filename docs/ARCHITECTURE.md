# Architecture

Modular monolith using Laravel 12. Request authentication precedes BusinessContext, which verifies the tenant is active and initializes a request-scoped TenantContext. TenantModel adds a qualified tenant global scope and derives ownership on creation. Missing context fails closed. User and Tenant are platform-level identity records; business resources use TenantModel.

Company/branch, sale/branch, item/sale/product and movement/branch/product/sale use composite ownership foreign keys. Cashiers require explicit branch membership; owners access their tenant branches. Manager/cashier membership UI is pending. Filament uses the same context middleware persistently on Livewire updates and ProductPolicy denies deletion.

Checkout validates input, locks the tenant row, checks branch/module access, detects replay, computes authoritative line-level tax, checks ledger stock, inserts sale/items/issues/audit atomically. Stock receipts and module changes share the tenant lock. This serializes all commerce per tenant on PostgreSQL/MySQL; it is an intentionally conservative initial design, not a high-throughput benchmark. SQLite is for local functional checks, not proof of production row-lock concurrency.

ModuleManager only offers the implemented modules. Required foundation modules cannot be removed. Optional module state and activation history live in tenant_modules and audit_logs. Disabling never deletes business data. Reports module currently represents an expansion boundary; the base workspace retains historical sales visibility.

Sanctum is installed for future APIs; no token issuance or REST API is exposed. No package APIs are invented. ProductSlug delegates only documented Unicode slug methods. Other integrations remain outside runtime until reviewed and tested.
