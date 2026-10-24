# Modules

`config/modules.php` is the implemented registry: core → products → inventory → sales → reports. Core/products/inventory are required in this milestone. Optional tenant state is stored in tenant_modules. Owners change state through workspace forms; dependencies are validated under a tenant lock. Module actions create audit entries.

Disable reports before sales. POS menu disappears and `/pos` and checkout deny access. Historical receipts and base workspace records remain visible. Unknown modules and required-module disabling reject validation. Global availability, branch overrides, company settings, plan entitlements and operational dependency checks are still open.
