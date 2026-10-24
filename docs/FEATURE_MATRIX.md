# Feature completion matrix

This is milestone 1, not a production release of the complete product. The original specification is preserved in [PRODUCT_REQUIREMENTS.md](PRODUCT_REQUIREMENTS.md). No open requirement is waived.

Status: **Tested** = executed automated tests; **Limited** = usable subset; **External** = needs a provider/device; **Planned** = not implemented.

| Area | Status | Delivered / remaining |
|---|---|---|
| Laravel foundation | Tested | Laravel 12, Filament 4, Livewire 3, Sanctum dependency, Vite/Tailwind |
| Registration and login | Tested / Limited | Session regeneration, logout, throttling; email verification, reset, MFA pending |
| Tenant isolation | Tested / Limited | Fail-closed scoped business models, active tenant checks, composite ownership FKs; background/export/cache isolation pending as those features arrive |
| Organization | Limited | Tenant → company → branches; organization settings, company administration pending |
| Roles and permissions | Tested / Limited | Owner, manager, cashier restrictions; branch assignments enforced, fine-grained customizable RBAC pending |
| Module engine | Tested / Limited | Tenant activation, dependencies, required modules, audit; company/branch/global/plan overrides pending |
| Business presets | Limited | Retail initialization and minimal demo; other presets pending |
| Catalog | Tested / Limited | Create/edit in Filament, SKU uniqueness, active flag, integer prices, tax, Unicode slug adapter; variants/categories/imports pending |
| Inventory | Tested / Limited | Positive receipts, immutable model ledger, sale issues; balances derivable from ledger; counts/transfers/valuation/reservations/warehouse UI pending |
| Retail POS | Tested / Limited | Local cart, SKU/name search, quantities, online cash checkout, exact server totals, print HTML receipt |
| Retry safety | Tested / Limited | Tenant-unique client ID, request hash, transaction, duplicate replay; survives requests while tab remains open only |
| Payments | Limited / External | Cash tender and change recorded on sale; separate payment ledger, shifts, split and electronic payments pending |
| Refunds and returns | Planned | No refund operation exposed |
| Offline POS | Planned | Explicitly unavailable; no IndexedDB, signed dataset, PWA, revocation or recovery yet |
| Restaurant / KDS / recipes / reservations | Planned | Not exposed in navigation |
| Purchases / suppliers | Planned | Stock receipt is not purchase-order receiving |
| CRM / loyalty / promotions | Planned | No customer data cached |
| Accounting | Planned | Sale totals are not double-entry accounting |
| HR / payroll / attendance | Planned / External | Device compatibility and jurisdiction setup required |
| Ecommerce / delivery / manufacturing / services | Planned / External | No live connectors |
| Reports | Limited | All-time gross sales and latest sales of accessible branches; full report center pending |
| SaaS billing / plans / entitlements | Planned | Businesses register, no subscriptions or billing |
| Marketing / CMS | Limited | Honest homepage, login, register; remaining public pages and CMS pending |
| Demo | Limited | Two independent retail/minimal businesses with stock; other scenarios/roles/reset selector pending |
| Onboarding | Limited | Registration creates company/branch/modules; guided wizard pending |
| AI | Planned / External | Disabled by absence; commerce makes no AI calls |
| Unicode PDF | Planned | HTML receipt print is not PDF engine or certified printer support |
| Universal slug | Tested | Reviewed package, locked commit, adapter, Bengali collisions and English tests |
| Other required packages | Evaluated / Planned | Metadata and README checked; admin source conflict documented; integration work pending |
| REST API / OpenAPI / webhooks | Planned | Sanctum installed, no public API contract or token-issuing endpoints yet |
| Notifications / settings / i18n | Planned | Theme toggle available; locale and typed settings pending |
| Security | Tested / Limited | Tenant/branch/auth tests; broader OWASP, file, token, webhook tests pending |
| Performance | Planned | No measured budgets or benchmarks; tenant lock prioritizes correctness |
| Deployment | Limited | Docker, Postgres, Redis, Nginx, queue, scheduler config and CI provided; full stack not executed locally |
| Browser verification | Executed / Limited | Registration → product → receive → cash sale → receipt at narrow viewport; full browser automation/responsive matrix pending |

## Prioritized next milestones

- [x] Audit empty workspace and install framework.
- [x] Implement first working tenant/catalog/receipt/checkout slice.
- [x] Verify financial arithmetic, retries, permissions and tenant denial cases.
- [ ] Expand authorization and organization settings; verify MySQL/PostgreSQL concurrency.
- [ ] Add registers/shifts, payment ledger, accounting postings, partial refunds and purchase receiving.
- [ ] Deliver authorized durable offline sale/reconciliation subsystem and failure tests.
- [ ] Deliver restaurant menu/table/order/kitchen/recipe flow.
- [ ] Expand inventory, procurement, CRM, loyalty and accounting.
- [ ] Integrate audited optional AI, attendance, PDF, profiling and hardware providers.
- [ ] Deliver remaining report center, SaaS billing, CMS and all requested public pages.
- [ ] Add remaining demo businesses, onboarding, i18n and role coverage.
- [ ] Execute complete release security, load, accessibility, backup/recovery and deployment checks.
