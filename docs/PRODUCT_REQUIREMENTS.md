# MASTER DEVELOPMENT PROMPT — WORLD-CLASS MODULAR POS SYSTEM

## PROJECT NAME: POS System

**Product:** POS System — Retail & Restaurant Sales, Offline-Capable

**Technology:** PHP Laravel 12, Filament, Livewire, Tailwind CSS, MySQL/PostgreSQL, Redis, JavaScript/TypeScript, Progressive Web App (PWA).

**Architecture:** Enterprise-grade, modular, multi-tenant, multi-company, multi-branch, multi-warehouse, multi-currency, multilingual, extensible SaaS.

**Mission:** Build a complete, production-ready, end-to-end business application that can manage almost every operational aspect of retail, restaurant, wholesale, distribution, hospitality-adjacent food service, and other compatible businesses.

The system must not be a collection of disconnected CRUD pages. Every business module must participate in real business workflows, with complete validation, permissions, transactions, reports, integrations, tests, and documentation.

The application must operate efficiently as:

- Single-shop POS
- Multi-branch retail POS
- Restaurant and café POS
- Supermarket and grocery POS
- Pharmacy POS where legally appropriate
- Electronics and appliance POS
- Fashion and clothing POS
- Bookshop and stationery POS
- Hardware and building-material POS
- Bakery and confectionery POS
- Restaurant chain POS
- Food court POS
- Fast-food and quick-service POS
- Wholesale business management
- Distributor sales management
- Inventory-connected business management
- Franchise operations
- Multi-company enterprise management
- SaaS platform serving many independent businesses

The platform must permit each business to activate or deactivate modules according to its needs.

A small retailer should see a simple POS, products, inventory, purchases, customers, and reports.

A restaurant should see its restaurant POS, tables, kitchen, menus, modifiers, dining orders, reservations, and restaurant-specific reports.

A large enterprise should be able to activate all relevant modules and coordinate many branches, warehouses, users, tax configurations, integrations, and business processes.

**Do not implement every feature as mandatory. Build a powerful modular core with configurable business capabilities.**

---

# 1. NON-NEGOTIABLE DEVELOPMENT INSTRUCTIONS

You are the lead software architect, Laravel backend engineer, Filament engineer, frontend engineer, database designer, SaaS architect, DevOps engineer, UI/UX designer, test engineer, security engineer, and technical documentation engineer.

Your responsibility is to complete the application end to end.

Follow these requirements:

1. Inspect the existing repository before changing anything.
2. Read the entire existing README.md and relevant documentation.
3. Preserve existing working functionality and project history.
4. If the repository is empty, initialize a complete Laravel application.
5. Develop with production architecture, not tutorial architecture.
6. Use modular, maintainable, strongly typed PHP code.
7. Follow Laravel conventions and PSR-12.
8. Use service classes, actions, policies, DTOs, events, jobs, and domain boundaries where appropriate.
9. Use database transactions for all critical financial and inventory operations.
10. Protect every business object with tenant and authorization boundaries.
11. Use real services and working pages rather than decorative placeholders.
12. Every navigation item must lead to an actual functional page.
13. Every button and action must have an implemented behavior.
14. Every form must validate, save, and report errors correctly.
15. Every business operation must generate correct data and auditable records.
16. Every report must calculate values from real underlying records.
17. Provide realistic demonstration data covering all major workflows.
18. Implement responsive mobile, tablet, and desktop interfaces.
19. Provide polished light and dark modes.
20. Build internationalization into the architecture.
21. Build meaningful accessibility support.
22. Add automated tests for all critical workflows.
23. Do not introduce undocumented external services or hard-coded credentials.
24. Do not use fictional APIs or assume package capabilities.
25. Resolve build failures and test failures before declaring completion.
26. Do not disable tests to make the build pass.
27. Do not silently omit requested features.
28. If a feature needs an optional external integration, provide a working internal fallback or explicitly mark the feature as integration-dependent.
29. Maintain a feature-completion checklist inside project documentation.
30. Continue implementing in logical phases until all defined acceptance criteria are satisfied.

**Quality standard:** A deployable business product, not a proof of concept.

---

# 2. REQUIRED TECHNOLOGY STACK

## Backend

- PHP 8.3 or newer, within dependency compatibility.
- Laravel 12.
- Composer for PHP dependencies.
- MySQL 8+ or supported PostgreSQL version.
- Laravel Eloquent ORM.
- Laravel migrations.
- Laravel queues, jobs, events, listeners, policies, notifications, and scheduler.
- Redis for caching, queue workloads, and optional real-time infrastructure.
- Laravel Sanctum for API token authentication where appropriate.
- REST API with OpenAPI documentation.
- Secure multi-tenant data access.
- Webhooks and integration connectors.

## Administration

Use a Composer-compatible, documented Filament version.

Build:

- Platform super-admin panel.
- SaaS tenant administration panel.
- Business owner panel.
- Branch management interface.
- Restaurant management interface.
- Store management interface.
- Inventory management interface.
- Staff administration.
- Reporting and analytics interface.

Use Filament Resources, Pages, Tables, Forms, Widgets, Actions, Notifications, and Policies.

## Point of Sale Frontend

Build a custom, extremely fast POS interface.

Use:

- Laravel backend
- Livewire where server-driven interaction is appropriate
- Alpine.js and/or TypeScript for low-latency local POS interactions
- Tailwind CSS
- Vite
- PWA service worker
- IndexedDB for durable offline operations

A cashier's POS screen must not require a network request for every product click, quantity update, or cart recalculation.

Build the interactive checkout frontend around fast local cart state with server-side transactional reconciliation.

## Architectural Principles

- Modular monolith initially.
- Explicit domain boundaries.
- Shared platform services.
- Tenant isolation.
- Branch-level permissions.
- Domain events.
- Idempotent commands.
- Transactional outbox where appropriate.
- Provider-neutral integration contracts.
- Testable domain services.
- Scalable deployment architecture.

Do not introduce microservices without a demonstrated requirement.

---

# 3. REQUIRED IMRANDEVBD PACKAGES

Evaluate and integrate the following packages as first-class dependencies where compatible.

## 3.1 Laravel Speed Optimization

Package:

https://packagist.org/packages/imrandevbd/drutogoti

Purpose:

- Performance diagnostics.
- Query optimization.
- N+1 query detection.
- Slow-query monitoring.
- Cache analysis.
- Performance recommendations.
- Production performance observability.

Integrate documented capabilities.

Configure safe production sampling.

Use performance analysis to identify and optimize:

- Product search
- Barcode lookup
- Checkout
- Inventory dashboards
- Sales reports
- Tenant dashboards
- Large Filament tables
- Multi-branch aggregation
- Background synchronization

Never use profiling data to expose sensitive customer or payment information.

## 3.2 Laravel Admin Panel Package

Package:

https://packagist.org/packages/imrandevbd/laravel-admin-panel

Purpose:

- Dashboard utilities.
- Administrative interfaces.
- Permissions.
- Widgets.
- Audit functionality.
- Reporting and related services where supported.

IMPORTANT:

The application must use Filament as the primary business administration framework.

The supplied Laravel Admin Panel package may have its own independent panel system.

Before installation:

1. Inspect Composer requirements.
2. Inspect package README and source.
3. Review route registration.
4. Review authentication implementation.
5. Review middleware.
6. Review database migrations.
7. Review RBAC implementation.
8. Review frontend asset handling.
9. Identify duplicated or conflicting functionality with Filament.
10. Determine which features can safely be reused through documented APIs.

Do not automatically register overlapping administration panels.

If compatible, use the package through a dedicated adapter, isolated route namespace, or documented integration boundary.

If incompatibilities exist, keep the Filament application functional, document the limitations, and do not force dependency conflicts.

## 3.3 Laravel AI Catalog

Package:

https://packagist.org/packages/imrandevbd/laravel-ai-catalog

Purpose:

- AI-assisted catalog creation.
- Product information enrichment.
- Product description generation.
- Data extraction from permitted sources.
- Categorization.
- Attribute suggestions.
- Catalog cleanup.

Provide:

- AI catalog import.
- Product draft generation.
- Manual approval.
- Duplicate detection.
- Category matching.
- Product image suggestions where legally permissible.
- Import previews.
- Structured validation.
- Data provenance.

Only access third-party websites where permitted by applicable law, site terms, and access controls.

Respect robots directives where applicable, rate limits, copyright, and licensing.

Never bypass authentication, CAPTCHA, or technical access controls.

AI-generated data must not automatically overwrite verified product records.

## 3.4 Laravel AI Hub

Package:

https://packagist.org/packages/imrandevbd/laravel-ai-hub

Purpose:

- Multi-provider AI services.
- AI assistant.
- AI reporting.
- AI-powered business analysis.
- Demand forecasting assistance.
- Product classification.
- Natural-language reporting.
- AI-supported inventory recommendations.

Create an AI provider abstraction.

All AI functions must be optional.

When disabled, all normal business operations must continue working.

Protect confidential business information, minimize transmitted data, and make provider usage configurable.

Implement usage limits, cost tracking, audit logs, and tenant-scoped permissions.

AI must never silently execute financial transactions or alter inventory without authorized confirmation.

## 3.5 Laravel Attendance Hub

Package:

https://packagist.org/packages/imrandevbd/laravel-attendance-hub

Purpose:

- Staff attendance.
- Supported attendance terminals.
- Employee punch synchronization.
- Device health monitoring.
- Attendance reports.

Implement as an optional HR attendance integration.

Add supported-device detection and manual attendance fallback.

Do not assume every biometric device uses a compatible protocol.

Do not expose sensitive biometric templates through ordinary business interfaces.

## 3.6 Laravel Unicode PDF

Package:

https://packagist.org/packages/imrandevbd/laravel-unicode-pdf

Purpose:

- Multilingual invoices.
- Receipts.
- Purchase orders.
- Sales reports.
- Financial statements.
- Inventory reports.
- Business documents.
- Bengali and other Unicode scripts.

Provide print layouts for:

- 58 mm thermal receipt
- 80 mm thermal receipt
- A4 invoice
- A5 invoice
- Packing slip
- Delivery note
- Purchase order
- Quotation
- Refund receipt
- Customer statement
- Stock report
- Financial report

Account for the difference between PDF generation and physical thermal printer integration.

PDF support must not be treated as automatic receipt-printer hardware support.

## 3.7 Laravel Universal Slug

Package:

https://packagist.org/packages/imrandevbd/laravel-universal-slug

Purpose:

- Multilingual URL slugs.
- Public website pages.
- Product catalog URLs.
- Category URLs.
- Blog URLs.
- SEO URLs.
- Slug uniqueness.
- URL redirect history where supported.

Support English, Bengali, Arabic, and additional Unicode-based languages.

## Package Integration Policy

For each package:

1. Read its latest published documentation.
2. Verify the installed version.
3. Validate Composer compatibility.
4. Pin a reproducible dependency version or commit reference where appropriate.
5. Read installation steps.
6. Implement using documented public APIs.
7. Add configuration.
8. Add a service adapter.
9. Add integration tests.
10. Document the integration in README.md.

Never fabricate package method names.

Never use `--ignore-platform-reqs` as a dependency compatibility solution.

Never overwrite package source files inside `vendor/`.

If an unreleased development branch is required, document the exact pinned commit and its risks.

---

# 4. COMPLETE PUBLIC WEBSITE

Build a beautiful, fast, modern, SEO-optimized, conversion-focused public marketing website.

The public website must clearly explain every available product module and business benefit.

It must feel like a polished commercial SaaS website rather than an admin dashboard exposed publicly.

## Required Pages

1. Homepage
2. All Features
3. Retail POS
4. Restaurant POS
5. Offline POS
6. Inventory Management
7. Multi-Branch Management
8. Warehouse Management
9. Purchase Management
10. Supplier Management
11. CRM
12. Loyalty and Rewards
13. Accounting
14. HR and Payroll
15. Restaurant Kitchen Management
16. Reporting and Analytics
17. AI Features
18. Hardware Integrations
19. Ecommerce Integrations
20. Payment Integrations
21. Business Types / Industries
22. Pricing
23. Pricing Comparison
24. Request a Demo
25. Interactive Demo
26. Contact
27. About Us
28. Blog
29. Blog Article
30. Help Center
31. Documentation
32. FAQ
33. Partners
34. Become a Reseller
35. Integrations Directory
36. Security
37. Privacy Policy
38. Terms of Service
39. Cookie Policy
40. Changelog
41. Roadmap
42. Login
43. Register
44. Forgot Password
45. Start Free Trial
46. Customer Testimonials
47. Case Studies
48. Status Page
49. Affiliate Program
50. Developer API Documentation

## Homepage Sections

- Modern navigation.
- Strong hero section.
- Functional demo CTA.
- Product interface previews.
- Industry categories.
- Core POS benefits.
- Retail features.
- Restaurant features.
- Offline capabilities.
- Multi-branch management.
- Inventory automation.
- Reports and analytics.
- AI features.
- Feature comparison.
- Integrations.
- Pricing.
- FAQ.
- Trust and security.
- Final signup CTA.
- Comprehensive footer.

## Website Administration

All marketing content must be manageable.

Build CMS administration for:

- Pages.
- Sections.
- Navigation menus.
- Footer.
- Blog posts.
- Categories.
- SEO metadata.
- Redirects.
- Images.
- FAQs.
- Testimonials.
- Pricing displays.
- Feature pages.
- Industry pages.
- Documentation.
- Contact submissions.

Ensure the website accurately distinguishes available features from planned or integration-dependent ones.

Never display fabricated testimonials, customer counts, certifications, or security claims.

---

# 5. SAAS PLATFORM AND TENANT MANAGEMENT

Build an optional SaaS operating mode.

The same codebase must also support deployment for a single independent business.

## SaaS Functions

- Tenant registration.
- Organization creation.
- Tenant onboarding.
- Trial accounts.
- Tenant subscriptions.
- Plan selection.
- Plan upgrades.
- Plan downgrades.
- Subscription renewal.
- Billing history.
- Invoices.
- Feature entitlements.
- Usage limits.
- Grace periods.
- Subscription suspension.
- Tenant reactivation.
- Tenant cancellation.
- Tenant deletion workflow.
- Data export.
- Tenant branding.
- Custom domains where properly configured.
- Tenant settings.
- Tenant usage dashboard.
- Tenant audit logs.
- Support access with explicit authorization.
- Platform announcements.
- Maintenance notifications.

## Tenant Isolation

Use a clear ownership hierarchy:

Platform → Tenant → Company → Branch → Warehouse / Register / Department.

Every tenant-owned record must have an explicit tenant association or an enforced relational ownership path.

Use scoped queries and policies consistently.

Do not rely only on UI filtering for tenant isolation.

Background jobs, exports, notifications, APIs, file storage, WebSocket channels, and cached records must also respect tenant boundaries.

## Subscription Plans

Provide configurable plans:

- Free Trial
- Starter
- Professional
- Business
- Enterprise
- Custom

Plans may limit:

- Number of branches.
- Number of users.
- Number of registers.
- Number of warehouses.
- Number of products.
- Enabled modules.
- API usage.
- AI usage.
- Storage.
- Support levels.

Do not hard-code prices or feature limits.

---

# 6. COMPLETE MODULAR FEATURE ENGINE

The module engine is one of the most important parts of this application.

Every major module must be configurable.

## Required Module Controls

- Global availability.
- Tenant-level enable/disable.
- Company-level configuration.
- Branch-level availability.
- Subscription entitlement.
- Dependency validation.
- Permission enforcement.
- Module configuration.
- Module activation history.
- Module deactivation history.
- Module status display.
- Configuration auditing.

Possible states:

- Available
- Enabled
- Disabled
- Suspended
- Configuration Required
- Dependency Missing
- Restricted by Plan

## Module Registry

Create a central module registry.

Suggested module definition:

```php
return [
    'key' => 'restaurant',
    'name' => 'Restaurant Management',
    'category' => 'industry',
    'default_enabled' => false,
    'dependencies' => [
        'core',
        'sales',
        'products',
    ],
    'optional_dependencies' => [
        'inventory',
        'loyalty',
        'reservations',
    ],
    'supports_branch_overrides' => true,
];
```

Implement an actual ModuleManager service.

Required functionality:

```php
ModuleManager::isEnabled(
    tenant: $tenant,
    module: 'restaurant',
    branch: $branch
);
```

This is an architectural example, not a claim that an existing package already provides this API.

Implement the service in the application.

## Disable Module Behavior

When a module is disabled:

- Hide related menus.
- Hide widgets.
- Disable related API functionality.
- Deny unauthorized routes and actions.
- Stop scheduled module-specific workloads.
- Stop new business actions belonging to that module.
- Preserve historical records.
- Preserve financial and audit records.
- Keep referential integrity.
- Prevent accidental data deletion.
- Display dependency warnings.

A module must never be disabled by dropping its tables or deleting historical business data.

## Business Presets

Provide initial configurations for:

- Retail
- Restaurant
- Grocery
- Supermarket
- Pharmacy
- Electronics
- Fashion
- Bakery
- Wholesale
- Distribution
- Franchise
- Mixed Retail + Restaurant
- Custom Business

Business owners must be able to adjust their preset later.

---

# 7. CORE BUSINESS FOUNDATION

Build the following foundational modules.

## Organization Management

- Business profiles.
- Companies.
- Branches.
- Departments.
- Locations.
- Warehouses.
- Stores.
- POS registers.
- Business addresses.
- Legal identifiers.
- Tax registration.
- Logos.
- Business documents.
- Fiscal years.
- Business calendars.
- Opening hours.
- Holidays.
- Default currencies.
- Time zones.
- Localization.

## Multi-Branch

- Unlimited branches within configured plan limits.
- Branch creation.
- Branch activation.
- Branch suspension.
- Branch managers.
- Branch-specific users.
- Branch-specific products.
- Branch pricing.
- Branch stock.
- Branch tax settings.
- Branch receipt templates.
- Branch sales targets.
- Branch expenses.
- Branch profit and loss.
- Branch-level dashboards.
- Inter-branch transfers.
- Centralized reporting.
- Branch comparison.
- Regional grouping.
- Franchise reporting.

## Role and Permission Management

Roles:

- Platform Super Admin
- Tenant Owner
- Company Administrator
- Regional Manager
- Branch Manager
- Store Manager
- Warehouse Manager
- Cashier
- Sales Associate
- Restaurant Manager
- Waiter
- Kitchen Staff
- Kitchen Manager
- Purchasing Officer
- Accountant
- HR Manager
- Inventory Clerk
- Auditor
- Customer Support Agent
- Read-Only Analyst
- Custom Roles

Permissions must support:

- Tenant scope.
- Company scope.
- Branch scope.
- Register scope.
- Resource scope.
- Action scope.

Sensitive actions require additional authorization.

Examples:

- Refund approval.
- Discount override.
- Cash drawer adjustment.
- Price override.
- Stock adjustment.
- Purchase approval.
- Invoice cancellation.
- Financial period reopening.
- Data export.
- Module configuration changes.

---

# 8. PRODUCT AND CATALOG MANAGEMENT

Implement:

- Product creation.
- Product editing.
- Product deletion restrictions.
- Product categories.
- Subcategories.
- Brands.
- Manufacturers.
- Units.
- Unit conversion.
- Product images.
- Image galleries.
- Product variants.
- Variant attributes.
- Multiple SKUs.
- Barcodes.
- QR codes.
- Product bundles.
- Product kits.
- Combo products.
- Service products.
- Non-stock products.
- Digital product support where applicable.
- Product tags.
- Product collections.
- Product descriptions.
- Multilingual descriptions.
- Cost prices.
- Selling prices.
- Wholesale prices.
- Customer-group prices.
- Branch-specific prices.
- Promotional prices.
- Tax categories.
- Supplier associations.
- Product dimensions.
- Product weights.
- Serial numbers.
- Lot numbers.
- Batches.
- Expiry dates.
- Warranty information.
- Product attachments.
- Import/export.
- Duplicate detection.
- Bulk editing.
- Product approval workflow.
- Catalog change history.

Support:

- Simple product.
- Variable product.
- Bundle.
- Kit.
- Service.
- Recipe-linked menu item.
- Weighted product.
- Serialized product.
- Batch-tracked product.

---

# 9. RETAIL POS

Build a full-screen, keyboard-friendly, touch-friendly POS interface.

## POS Features

- Fast product search.
- Barcode scanning.
- Category browsing.
- Product image browsing.
- Product favorites.
- Recently sold products.
- Custom products with permission.
- Product variants.
- Product bundles.
- Serial number selection.
- Batch selection.
- Quantity adjustment.
- Unit selection.
- Line-item discounts.
- Cart discounts.
- Percentage discounts.
- Fixed discounts.
- Automatic promotions.
- Coupon codes.
- Customer selection.
- Customer quick-create.
- Salesperson attribution.
- Tax calculations.
- Inclusive tax.
- Exclusive tax.
- Multiple tax rates.
- Tax exemption rules.
- Split payments.
- Cash payments.
- Card terminal integrations.
- Bank transfers.
- Digital wallet integrations.
- Store credit.
- Gift cards.
- Partial payments.
- Account sales.
- Installment receivables where legally applicable.
- Payment change calculation.
- Hold sale.
- Resume sale.
- Cancel sale.
- Void sale with authorization.
- Refund.
- Exchange.
- Partial return.
- Receipt printing.
- Email receipt.
- SMS receipt.
- PDF receipt.
- Customer display.
- Cash drawer integration.
- Cashier shift management.
- Register opening.
- Register closing.
- Cash reconciliation.
- Cash in.
- Cash out.
- End-of-day report.
- Receipt reprinting.
- Duplicate sale prevention.

## POS UX

The cashier should be able to:

1. Open POS.
2. Scan a product.
3. Change quantity.
4. Choose a customer.
5. Apply an authorized discount.
6. Take payment.
7. Print a receipt.
8. Start the next sale.

Keep the primary checkout interface fast and visually uncluttered.

Advanced controls must remain accessible without overwhelming the cashier.

## Barcode Hardware

Support keyboard-emulating scanners by default.

Provide adapters for supported:

- USB scanners.
- Bluetooth scanners.
- Camera scanning.
- Weighing scales.
- Customer displays.
- Cash drawers.
- Receipt printers.
- Label printers.

Browser hardware access varies by device and permissions.

Where direct browser access is unavailable, provide an optional local hardware bridge.

---

# 10. REAL OFFLINE-CAPABLE POS

Offline capability must be a real implemented subsystem.

A cached webpage alone does not qualify as offline POS.

## Offline Architecture

Use:

- Installable PWA.
- Service worker.
- IndexedDB.
- Versioned offline data.
- Offline catalog snapshots.
- Offline pricing snapshots.
- Offline tax configurations.
- Offline business rules.
- Offline cashier identity/session validation.
- Durable pending-transaction queue.
- Synchronization coordinator.
- Retry engine.
- Synchronization status interface.

## Offline Workflow

The system must support:

1. Cashier authenticates online.
2. Authorized offline dataset downloads.
3. Network becomes unavailable.
4. Cashier continues permitted sales.
5. Sales are stored locally.
6. Each transaction receives a globally unique client-generated ID.
7. Sync queue preserves transaction ordering where required.
8. Connection returns.
9. Server validates and reconciles transactions.
10. Successful operations receive server acknowledgements.
11. Duplicate submissions are ignored idempotently.
12. Conflicts are detected and handled.
13. Cashier can view synchronization status.

## Conflict Resolution

Handle:

- Inventory shortages.
- Outdated prices.
- Outdated taxes.
- Disabled products.
- Suspended customers.
- Duplicate sales.
- Invalid refunds.
- Shift closure conflicts.
- Expired promotions.
- Reassigned registers.
- Server-side permission changes.

Do not silently discard an accepted offline sale.

Provide conflict states, supervisor review, and reconciliation workflows.

Never promise that all card payment terminals work offline.

Only permit offline electronic payment flows where a certified payment provider explicitly supports them.

Otherwise offer safe alternatives such as permitted cash transactions or deferred payment authorization.

Never store raw card data, CVV, or payment secrets offline.

## Offline Security

- Minimize locally cached personal information.
- Encrypt appropriate local data using a documented key-management approach.
- Use secure browser storage practices.
- Implement offline session expiration.
- Support device registration.
- Support device revocation on reconnection.
- Allow offline sales only within configurable risk thresholds.
- Detect duplicate submissions.
- Prevent unsigned transaction manipulation.
- Provide local storage quota monitoring.
- Provide recovery from interrupted synchronization.

## Required Offline Tests

- No internet before checkout.
- Internet disconnects during checkout.
- Internet returns after multiple sales.
- Browser reload during pending sync.
- Duplicate sync request.
- Conflicting stock.
- Conflicting tax.
- Two offline devices sell the same product.
- Server restarts during sync.
- Repeated network failure.
- Offline shift close.
- Device storage nearing quota.

---

# 11. RESTAURANT POS AND FOOD SERVICE

Create a restaurant-specific operating system.

## Restaurant Setup

- Restaurant branches.
- Dining areas.
- Floors.
- Tables.
- Table capacity.
- Table QR codes.
- Table status.
- Menu categories.
- Menu items.
- Menu variants.
- Modifier groups.
- Required modifiers.
- Optional modifiers.
- Menu combinations.
- Add-ons.
- Portion sizes.
- Recipe management.
- Ingredient links.
- Preparation times.
- Kitchen stations.
- Restaurant shifts.
- Service charge settings.
- Tip settings.
- Dine-in settings.
- Takeaway settings.
- Delivery settings.

## Restaurant Sales

- Dine-in.
- Takeaway.
- Delivery.
- Counter service.
- Drive-through configuration.
- Table service.
- Self-service kiosk mode.
- QR ordering.
- Waiter order capture.
- Order modifications.
- Add cooking instructions.
- Send order to kitchen.
- Order preparation status.
- Table transfer.
- Table merge.
- Split table bill.
- Split by guest.
- Split by item.
- Merge guest bills.
- Partial payment.
- Tips.
- Discounts.
- Service charges.
- Payment settlement.
- Receipt printing.

## Kitchen Display System

Build a functional KDS:

- Incoming orders.
- Kitchen ticket numbers.
- Station routing.
- Item preparation status.
- Order priority.
- Preparation timers.
- Ready notifications.
- Completed orders.
- Cancelled order handling.
- Expedited orders.
- Kitchen performance metrics.

Support printer-based kitchen tickets where configured.

## Restaurant Reservations

- Reservation calendar.
- Table reservation.
- Guest details.
- Party size.
- Arrival time.
- Reservation status.
- Waitlist.
- Table availability.
- Walk-in management.
- Deposit support.
- Cancellation policies.
- No-show tracking.
- Reservation reminders.

## Food Inventory

- Recipes.
- Ingredients.
- Recipe cost.
- Portion cost.
- Ingredient consumption.
- Waste tracking.
- Yield calculations.
- Sub-recipes.
- Preparation batches.
- Supplier ingredient pricing.
- Low-stock alerts.
- Menu availability.
- Food cost reporting.
- Gross margin reporting.

Restaurant stock consumption must correspond to configured recipe rules and order lifecycle events.

Implement safeguards against double consumption when orders are edited or synchronized.

---

# 12. INVENTORY AND WAREHOUSE MANAGEMENT

Implement:

- Inventory overview.
- Branch stock.
- Warehouse stock.
- Storage locations.
- Stock ledger.
- Stock movements.
- Stock receipts.
- Stock issues.
- Stock adjustments.
- Stock transfers.
- Transfer requests.
- Transfer approval.
- Goods in transit.
- Goods receipt.
- Inventory reservations.
- Stock counting.
- Cycle counting.
- Physical inventory reconciliation.
- Damaged inventory.
- Expired inventory.
- Write-offs.
- Returns to supplier.
- Minimum stock.
- Maximum stock.
- Reorder points.
- Reorder quantities.
- Stock alerts.
- Batch tracking.
- Lot tracking.
- Serial tracking.
- Expiry tracking.
- FIFO valuation.
- Weighted average valuation.
- Other supported configurable costing policies.
- Stock aging.
- Dead-stock detection.
- Slow-moving inventory.
- Fast-moving inventory.
- Inventory valuation.
- Stock movement audit trail.

Use an immutable stock movement ledger with compensating entries for corrections.

Do not calculate inventory solely from a mutable product quantity field.

Prevent stock corruption under concurrent transactions.

---

# 13. PURCHASES AND SUPPLIERS

Build a complete procurement workflow.

- Supplier directory.
- Supplier categories.
- Supplier contacts.
- Supplier price lists.
- Supplier contracts.
- Purchase requisitions.
- Purchase approvals.
- Request for quotation.
- Supplier quotation comparison.
- Purchase orders.
- Purchase order approval.
- Partial receiving.
- Full receiving.
- Goods received notes.
- Supplier invoices.
- Purchase returns.
- Purchase credit notes.
- Supplier payment recording.
- Supplier balances.
- Supplier statements.
- Supplier performance.
- Supplier lead times.
- Reorder suggestions.
- Purchase forecasting.
- Landed cost allocation.
- Freight expenses.
- Purchase taxes.
- Import-related costs where applicable.

Maintain accurate links between purchase orders, goods receipts, supplier invoices, inventory valuation, and accounts payable.

---

# 14. CRM AND CUSTOMER MANAGEMENT

Create:

- Customer profiles.
- Individual customers.
- Business customers.
- Customer groups.
- Customer addresses.
- Contact history.
- Customer notes.
- Customer tags.
- Sales history.
- Purchase frequency.
- Average transaction value.
- Customer lifetime value reporting.
- Outstanding balances.
- Credit limits.
- Customer statements.
- Store credit.
- Loyalty program.
- Reward points.
- Membership tiers.
- Referral programs.
- Gift cards.
- Customer feedback.
- Support tickets.
- Customer segmentation.
- Marketing preferences.
- Consent records.
- Birthday offers.
- Promotional campaigns.
- Customer communication history.

Respect privacy and consent requirements for customer communications.

---

# 15. PRICING, PROMOTIONS, AND LOYALTY

Support:

- Price lists.
- Branch prices.
- Customer prices.
- Wholesale prices.
- Scheduled prices.
- Quantity discounts.
- Tiered pricing.
- Buy X Get Y.
- Combo discounts.
- Product promotions.
- Category promotions.
- Cart promotions.
- Coupons.
- Gift vouchers.
- Store credit.
- Loyalty points.
- Loyalty redemption.
- Membership discounts.
- Limited-time offers.
- Promotion usage limits.
- Promotion stacking rules.
- Promotion approval.
- Promotion performance reports.

Build a deterministic pricing engine.

Define precedence for:

1. Base price.
2. Customer-specific pricing.
3. Branch overrides.
4. Promotions.
5. Discounts.
6. Tax calculation.
7. Rounding.

Document exact precedence and configuration policies.

---

# 16. FINANCE AND ACCOUNTING

Create an optional accounting module with complete operational integration.

## Financial Modules

- Chart of accounts.
- Account groups.
- Financial periods.
- Journals.
- Journal entries.
- General ledger.
- Cash accounts.
- Bank accounts.
- Accounts receivable.
- Accounts payable.
- Customer invoices.
- Supplier invoices.
- Credit notes.
- Debit notes.
- Payment recording.
- Expense tracking.
- Expense categories.
- Expense approval.
- Petty cash.
- Cash transfers.
- Bank reconciliation.
- Tax ledgers.
- Profit and loss.
- Balance sheet.
- Trial balance.
- Cash flow statement.
- Branch financial reporting.
- Cost center reporting.
- Financial closing.
- Period locks.
- Adjustment journals.
- Accounting audit trail.

Use double-entry accounting for ledger postings.

Every posted journal must balance.

Record all financial values using fixed-precision decimal or integer minor-unit representations according to currency requirements.

Never use floating-point arithmetic for authoritative money calculations.

Support configurable tax regimes.

Do not claim automatic compliance with every country's financial regulations.

Country-specific compliance must be explicitly configured and validated.

---

# 17. EMPLOYEE, HR, ATTENDANCE, AND PAYROLL

Build an optional HR module.

- Employees.
- Staff profiles.
- Employment details.
- Departments.
- Positions.
- Staff documents.
- Staff schedules.
- Shift assignments.
- Time tracking.
- Attendance.
- Leave requests.
- Leave approvals.
- Overtime.
- Holidays.
- Payroll setup.
- Salary components.
- Allowances.
- Deductions.
- Payroll periods.
- Payslips.
- Payroll approval.
- Payroll history.
- Staff performance reporting.
- Sales commissions.
- Staff targets.
- Commission calculations.
- Attendance machine integration.
- Manual attendance.
- Device synchronization history.

Payroll tax and employment-law behavior must be jurisdiction-specific and explicitly configured.

---

# 18. ECOMMERCE AND OMNICHANNEL SALES

Build optional ecommerce and marketplace integrations.

- Online storefront.
- Online product catalog.
- Shopping cart.
- Customer checkout.
- Online customer account.
- Online orders.
- Order fulfillment.
- Pickup orders.
- Click and collect.
- Delivery orders.
- Online inventory synchronization.
- Product synchronization.
- Price synchronization.
- Order import.
- Order status updates.
- Refund synchronization.
- Customer synchronization.
- Product feed management.

Provide connector architecture for supported external ecommerce systems.

Ensure an online order does not double-deduct inventory when imported into POS.

---

# 19. DELIVERY AND ORDER FULFILLMENT

Implement:

- Delivery orders.
- Pickup orders.
- Delivery zones.
- Delivery charges.
- Shipping profiles.
- Dispatch management.
- Driver assignment.
- Delivery status.
- Proof of delivery.
- Order tracking.
- Packing slips.
- Fulfillment batches.
- Partial fulfillment.
- Delivery returns.
- Failed delivery handling.
- Third-party delivery integrations.
- Delivery performance reports.

---

# 20. MANUFACTURING, ASSEMBLY, AND RECIPE-BASED PRODUCTION

Optional module:

- Bill of materials.
- Product assembly.
- Production orders.
- Material reservations.
- Material issue.
- Production stages.
- Finished goods receipt.
- Scrap and waste.
- Production cost.
- Production scheduling.
- Assembly disassembly.
- Yield tracking.
- Quality checks.
- Batch production.
- Production reporting.

Keep this module separate from basic retail functions.

---

# 21. SERVICE BUSINESS MODULE

Optional features for compatible service businesses:

- Service catalog.
- Service bookings.
- Appointments.
- Staff assignments.
- Service work orders.
- Service quotations.
- Service invoices.
- Service packages.
- Service contracts.
- Maintenance reminders.
- Service warranty records.
- Customer service history.

---

# 22. AI BUSINESS INTELLIGENCE

Use Laravel AI Hub where appropriate.

Build optional AI features:

- AI dashboard assistant.
- Natural-language report queries.
- Sales trend explanations.
- Product demand insights.
- Low-stock recommendations.
- Inventory reorder suggestions.
- Slow-moving inventory analysis.
- Supplier performance summaries.
- Product description generation.
- Product categorization.
- Catalog data cleanup.
- Customer segmentation assistance.
- Promotional campaign drafting.
- Restaurant menu insights.
- Recipe profitability explanations.
- Branch performance comparisons.
- Revenue forecasting assistance.
- Cash flow forecasting assistance.
- Inventory anomaly detection.

AI insights must be clearly labeled as generated or estimated.

Financial totals and stock quantities must come from deterministic system calculations, not guessed AI responses.

Use approval workflows for AI-proposed changes.

---

# 23. REPORTING AND ANALYTICS

Create a comprehensive report center.

## Sales Reports

- Daily sales.
- Weekly sales.
- Monthly sales.
- Annual sales.
- Sales by branch.
- Sales by register.
- Sales by cashier.
- Sales by product.
- Sales by category.
- Sales by customer.
- Sales by payment method.
- Sales by hour.
- Sales by day.
- Discount reports.
- Tax reports.
- Return reports.
- Refund reports.
- Gross margin.
- Net sales.

## Inventory Reports

- Stock on hand.
- Stock valuation.
- Stock movement.
- Stock adjustments.
- Stock transfers.
- Low stock.
- Out of stock.
- Expiring stock.
- Expired stock.
- Fast-moving products.
- Slow-moving products.
- Inventory aging.
- Inventory turnover.
- Stock reconciliation.

## Restaurant Reports

- Sales by table.
- Sales by menu item.
- Kitchen preparation performance.
- Food cost.
- Ingredient usage.
- Waste.
- Table turnover.
- Reservation performance.
- Order preparation time.
- Average order value.
- Dine-in versus takeaway.
- Delivery performance.

## Financial Reports

- Profit and loss.
- Balance sheet.
- Cash flow.
- Trial balance.
- Expenses.
- Receivables.
- Payables.
- Tax summary.
- Cashier settlement.
- Branch profitability.

## SaaS Reports

- Active tenants.
- Trial tenants.
- Paid subscriptions.
- Module adoption.
- Tenant usage.
- Platform revenue.
- Subscription churn.
- AI cost.
- Service health.

## Report Features

- Date filters.
- Branch filters.
- Company filters.
- Product filters.
- Employee filters.
- Customer filters.
- Saved report configurations.
- CSV export.
- XLSX export.
- Multilingual PDF export.
- Scheduled reports.
- Email report delivery.
- Print-friendly layouts.
- Drill-down.
- Access permissions.
- Cached aggregates where safe.

Every KPI must have a documented calculation definition.

---

# 24. DASHBOARDS

Build role-specific dashboards.

## Platform Admin Dashboard

- Tenants.
- Subscriptions.
- Revenue.
- Platform users.
- Module usage.
- Platform alerts.
- Queue health.
- System performance.
- Integration health.

## Business Owner Dashboard

- Today's revenue.
- Total orders.
- Gross profit estimate.
- Branch comparison.
- Sales trends.
- Payment summaries.
- Inventory alerts.
- Staff performance.
- Outstanding payments.
- Restaurant orders where enabled.

## Branch Dashboard

- Branch revenue.
- Branch orders.
- Cashier shifts.
- Branch stock.
- Branch expenses.
- Local alerts.

## Cashier Dashboard

- Current shift.
- Shift sales.
- Payment totals.
- Held orders.
- Pending sync.
- Cash reconciliation.

## Restaurant Dashboard

- Active tables.
- Kitchen orders.
- Pending meals.
- Completed orders.
- Reservations.
- Menu performance.
- Restaurant revenue.

Widgets must adapt to enabled modules and current permissions.

---

# 25. COMPLETE DEMO SYSTEM

A realistic demo system is mandatory.

The application must provide several independent demonstration businesses.

## Demo Tenant 1 — Retail Store

Business Name: Demo Retail Store

Modules:

- Retail POS.
- Products.
- Inventory.
- Purchases.
- Suppliers.
- Customers.
- Loyalty.
- Reports.

Seed realistic:

- Branches.
- Cashiers.
- Registers.
- Categories.
- Brands.
- Products.
- Prices.
- Barcodes.
- Customers.
- Suppliers.
- Sales.
- Returns.
- Purchases.
- Stock movements.
- Payments.

## Demo Tenant 2 — Restaurant

Business Name: Demo Restaurant

Modules:

- Restaurant POS.
- Tables.
- Kitchen.
- Menu.
- Recipes.
- Ingredients.
- Reservations.
- Inventory.
- Reports.

Seed realistic:

- Restaurant branches.
- Dining floors.
- Tables.
- Waiters.
- Kitchen employees.
- Menu items.
- Modifiers.
- Recipes.
- Sample orders.
- Kitchen tickets.
- Reservations.
- Food stock.
- Restaurant expenses.

## Demo Tenant 3 — Supermarket

Business Name: Demo Supermarket

Modules:

- Retail POS.
- Weighted products.
- Barcodes.
- Multiple branches.
- Warehouses.
- Bulk purchasing.
- Promotions.
- Loyalty.
- Expiry tracking.

## Demo Tenant 4 — Enterprise

Business Name: Demo Enterprise Group

Modules:

- Multiple companies.
- Multiple branches.
- Warehouses.
- Retail.
- Restaurant.
- Accounting.
- Purchasing.
- HR.
- Attendance.
- Analytics.
- AI.

## Demo Tenant 5 — Minimal Business

Business Name: Demo Small Shop

Modules:

- POS.
- Products.
- Basic stock.
- Basic sales.
- Basic reports.

This tenant demonstrates that the application operates correctly with most optional modules disabled.

## Demo Accounts

Create development/demo accounts such as:

| Role | Email |
|---|---|
| Platform Admin | platform@demo.pos.test |
| Business Owner | owner@demo.pos.test |
| Branch Manager | manager@demo.pos.test |
| Cashier | cashier@demo.pos.test |
| Restaurant Manager | restaurant@demo.pos.test |
| Kitchen Staff | kitchen@demo.pos.test |
| Inventory Manager | inventory@demo.pos.test |
| Accountant | accountant@demo.pos.test |
| HR Manager | hr@demo.pos.test |

Use a locally configured demo password through secure environment configuration.

Never commit production credentials or hard-coded privileged secrets.

Provide a demo login selector to choose roles and business scenarios.

The public demo environment must use isolated, disposable data and must reset automatically or through an authorized administrative action.

Never connect public demo accounts to live financial or customer data.

---

# 26. COMPLETE ONBOARDING WIZARD

Create a guided new-business setup experience.

Steps:

1. Create account.
2. Create organization.
3. Select business type.
4. Select currency and country.
5. Configure business profile.
6. Create first branch.
7. Configure tax rules.
8. Select modules.
9. Configure register.
10. Add staff.
11. Import products.
12. Configure payments.
13. Configure receipts.
14. Run sample sale.
15. Complete onboarding.

For restaurants, include:

- Restaurant floor.
- Tables.
- Kitchen stations.
- Menu.
- Modifiers.

For retailers, include:

- Product catalog.
- Inventory.
- Barcode settings.
- Register configuration.

Allow users to skip optional steps and complete them later.

Show progress and configuration health.

---

# 27. IMPORT, EXPORT, AND DATA MIGRATION

Support:

- CSV import.
- XLSX import.
- Export.
- Field mapping.
- Import preview.
- Validation.
- Duplicate detection.
- Dry-run mode.
- Partial failure reporting.
- Background processing.
- Import history.
- Error file download.
- Supported legacy POS migration adapters.

Create importers for:

- Products.
- Customers.
- Suppliers.
- Stock.
- Prices.
- Employees.
- Branches.
- Opening balances.

Large imports must use controlled batching and resumable processing.

---

# 28. PAYMENTS AND FINANCIAL INTEGRATIONS

Create a payment gateway abstraction.

Support configurable integrations for applicable providers and regions.

Consider:

- Stripe.
- PayPal.
- Square.
- Regional payment gateways.
- Bank transfer.
- Cash.
- Authorized card terminals.
- Mobile payment providers.

Bangladesh-oriented integrations may include supported local gateways such as SSLCommerz and relevant authorized mobile payment integrations.

Every provider must be integrated using its documented merchant APIs, sandbox credentials, and security requirements.

Never claim a payment method is live without a successful integration test.

Implement:

- Payment intents where appropriate.
- Provider callbacks.
- Webhook signature verification.
- Idempotency.
- Payment reconciliation.
- Partial payments.
- Refunds.
- Chargeback status where available.
- Gateway fees.
- Transaction references.
- Settlement reporting.

Do not store sensitive raw card information.

---

# 29. API AND THIRD-PARTY INTEGRATIONS

Build a versioned API.

Example:

`/api/v1/`

Provide documented endpoints for:

- Authentication.
- Tenant context.
- Branches.
- Products.
- Categories.
- Inventory.
- Customers.
- Suppliers.
- Sales.
- Orders.
- Payments.
- Refunds.
- Restaurant tables.
- Kitchen orders.
- Purchases.
- Reports.
- Module settings.
- Offline synchronization.

Requirements:

- Tenant isolation.
- API authentication.
- Permission scopes.
- Request validation.
- Pagination.
- Rate limits.
- API versioning.
- Idempotency keys.
- Stable response contracts.
- Webhook support.
- Structured error responses.
- OpenAPI specification.

Create a webhook center with:

- Endpoints.
- Subscribed events.
- Signing secrets.
- Delivery attempts.
- Retry policies.
- Delivery logs.
- Dead-letter handling.

---

# 30. NOTIFICATIONS AND COMMUNICATION

Support:

- In-app notifications.
- Email notifications.
- SMS integrations.
- Push notifications where supported.
- Webhook notifications.

Events:

- Low stock.
- Out of stock.
- New order.
- Completed order.
- Refund request.
- Purchase approval.
- Supplier delivery.
- Shift closure.
- Payment failure.
- Subscription renewal.
- Expiring product.
- Pending offline sync.
- Attendance issue.
- Financial approval.

Build notification templates and preferences.

Respect tenant communication settings.

---

# 31. SETTINGS CENTER

Build a unified settings interface.

Categories:

- General.
- Business.
- Companies.
- Branches.
- Modules.
- Users.
- Roles.
- Permissions.
- POS.
- Register.
- Restaurant.
- Products.
- Inventory.
- Purchases.
- Customers.
- Pricing.
- Tax.
- Payments.
- Accounting.
- HR.
- Attendance.
- AI.
- Integrations.
- Hardware.
- Notifications.
- Offline.
- Reports.
- Security.
- Localization.
- Appearance.
- Backup.
- API.
- Subscription.

Settings must use properly typed schemas, validation, defaults, scope inheritance, and audit logging.

---

# 32. MULTILINGUAL AND MULTI-CURRENCY

Provide translation infrastructure.

Initial languages:

- English.
- Bengali.

Design for expansion into:

- Arabic.
- Hindi.
- Spanish.
- French.
- Additional languages.

Support:

- Locale switching.
- Translation files.
- RTL layouts.
- Localized dates.
- Localized time.
- Localized numbers.
- Localized currency formatting.
- Multilingual receipts.
- Multilingual PDFs.
- Localized product descriptions.
- Localized website pages.

For currencies:

- ISO currency codes.
- Currency-specific minor units.
- Exchange rate records.
- Base currency.
- Reporting currency.
- Currency conversion history.
- Explicit conversion dates.
- Correct rounding rules.

---

# 33. UI/UX DESIGN STANDARD

Build a professional commercial interface.

## Visual Design

- Premium SaaS appearance.
- Consistent design system.
- Responsive layouts.
- Excellent typography.
- Accessible color contrast.
- Modern cards.
- Clear navigation.
- Polished tables.
- Powerful filters.
- Useful empty states.
- Loading skeletons.
- Helpful validation.
- Descriptive errors.
- Toast notifications.
- Confirmation dialogs.
- Keyboard shortcuts.
- Touch optimization.
- Light mode.
- Dark mode.

## Navigation

Menus must dynamically adapt to:

- User permissions.
- Enabled modules.
- Selected branch.
- Current business type.
- Subscription plan.

## POS-Specific UI

Create a high-performance touch interface with:

- Product grid.
- Search.
- Barcode input.
- Cart panel.
- Customer panel.
- Discount controls.
- Payment modal.
- Receipt controls.
- Offline status.
- Shift status.

## Restaurant UI

Use:

- Interactive table map.
- Table statuses.
- Kitchen ticket cards.
- Order timers.
- Menu modifiers.
- Waiter order interface.
- Payment splitting interface.

Do not force restaurant waiters or cashiers to navigate complex Filament forms for ordinary operations.

---

# 34. DATABASE DESIGN

Design a normalized, indexed, scalable database.

Core entities should include appropriate versions of:

- tenants
- companies
- branches
- departments
- users
- roles
- permissions
- warehouses
- warehouse_locations
- registers
- register_shifts
- modules
- tenant_modules
- branch_modules
- subscription_plans
- subscriptions
- products
- product_variants
- product_barcodes
- categories
- brands
- price_lists
- prices
- customers
- customer_groups
- suppliers
- inventories
- inventory_movements
- stock_reservations
- stock_transfers
- stock_counts
- batches
- serial_numbers
- purchase_orders
- purchase_order_items
- goods_receipts
- sales
- sale_items
- payments
- refunds
- returns
- promotions
- coupons
- loyalty_transactions
- gift_cards
- restaurant_tables
- restaurant_orders
- restaurant_order_items
- kitchen_tickets
- recipes
- recipe_ingredients
- reservations
- employees
- attendance_records
- payroll_runs
- accounts
- journals
- journal_lines
- invoices
- expenses
- notifications
- webhooks
- webhook_deliveries
- offline_devices
- offline_transactions
- synchronization_attempts
- audit_logs
- integration_connections
- settings
- media
- import_jobs
- export_jobs

The exact schema should be determined through domain modeling, not blind creation of tables from this list.

## Database Rules

- Foreign keys.
- Appropriate indexes.
- Unique constraints.
- Tenant-scoped uniqueness where necessary.
- Transactional integrity.
- Optimistic or pessimistic locking where needed.
- Auditability.
- Soft deletes only where appropriate.
- Financial immutability.
- Data retention policies.
- Sensitive-data protection.

Avoid polymorphic relationships when they undermine financial integrity or tenant boundaries.

---

# 35. SECURITY REQUIREMENTS

Implement:

- Secure authentication.
- Email verification.
- Password reset.
- Optional MFA.
- Session management.
- Login throttling.
- Role-based access.
- Fine-grained permissions.
- Tenant isolation.
- Branch isolation.
- CSRF protection.
- XSS prevention.
- SQL injection prevention.
- Input validation.
- Secure file upload.
- Protected API access.
- Signed webhooks.
- Secure audit logs.
- Sensitive configuration encryption.
- Environment-based secrets.
- Account suspension.
- Device management.
- Secure impersonation with audit trails.
- Backup protection.
- Security event reporting.
- Dependency vulnerability scanning.

Follow OWASP-aligned secure development practices.

Explicitly test for insecure direct object references and cross-tenant access vulnerabilities.

Do not use production data in demo environments.

---

# 36. PERFORMANCE REQUIREMENTS

Optimize:

- Product lookup.
- Barcode scanning.
- Cart interaction.
- Checkout.
- Reports.
- Stock calculations.
- Large product catalogs.
- Multi-branch reporting.
- Large Filament tables.
- Offline synchronization.
- Queue throughput.

Use:

- Proper indexing.
- Query optimization.
- Eager loading.
- Redis caching.
- Cache invalidation.
- Paginated datasets.
- Background jobs.
- Aggregated reporting tables where appropriate.
- Lazy loading of nonessential assets.
- Compressed frontend assets.
- Database monitoring.
- Performance regression tests.

Create measurable performance budgets and benchmarking scripts.

Document results under specified hardware, database size, and network conditions.

Do not publish invented performance benchmarks.

---

# 37. TESTING STRATEGY

Create automated tests using Pest or PHPUnit and appropriate browser testing tools.

## Required Test Categories

### Unit Tests

- Pricing.
- Discounts.
- Taxes.
- Money calculations.
- Stock valuation.
- Promotion rules.
- Loyalty points.
- Module dependencies.
- Accounting balancing.
- Restaurant recipe consumption.

### Feature Tests

- Tenant registration.
- Business onboarding.
- Module activation.
- Module deactivation.
- Branch creation.
- Product creation.
- Sales processing.
- Refunds.
- Stock adjustments.
- Transfers.
- Purchases.
- Reservations.
- Kitchen workflow.
- Employee attendance.
- Reports.
- APIs.

### Integration Tests

- AI packages.
- PDF generation.
- Payment gateway sandbox.
- Receipt printing adapters.
- Attendance integrations.
- Email.
- Webhooks.
- Catalog imports.

### Offline Tests

- Network loss.
- Offline transaction persistence.
- Queue recovery.
- Duplicate sync.
- Stock conflicts.
- Device revocation.
- Concurrent offline sales.

### Security Tests

- Cross-tenant data access.
- Unauthorized refund.
- Unauthorized discount.
- Unauthorized module access.
- Branch permission bypass.
- API scope violation.
- File access violations.
- Webhook signature rejection.

### Browser E2E Tests

- Public website signup.
- Create company.
- Create branch.
- Add product.
- Open POS.
- Complete sale.
- Print receipt.
- Refund sale.
- Restaurant order.
- Kitchen fulfillment.
- Run report.
- Disable optional module.

---

# 38. CRITICAL REAL-WORLD WORKFLOWS

The following workflows must operate end to end.

## Workflow A — Retail Sale

Create product → receive stock → open register → scan product → calculate price and tax → accept payment → persist sale → record stock movement → record financial effects → generate receipt → update reports.

## Workflow B — Restaurant Order

Create menu → configure recipe → allocate table → place order → send kitchen ticket → prepare food → serve order → accept payment → finalize order → consume inventory according to configured rules → update sales and food-cost reports.

## Workflow C — Purchase

Create supplier → create purchase order → approve → receive goods → record inventory → record payable → pay supplier → reconcile balances → update purchasing reports.

## Workflow D — Branch Transfer

Request transfer → approve → dispatch stock → record goods in transit → receive at destination → reconcile differences → update both branch stock ledgers.

## Workflow E — Offline Sale

Download offline dataset → lose connection → create sale → store locally → regain connection → synchronize once → validate stock and business rules → reconcile → confirm status.

## Workflow F — Refund

Locate original sale → verify eligible items → authorize refund → issue provider-supported refund or account adjustment → reverse relevant financial entries → restore inventory where applicable → generate refund receipt → audit the operation.

## Workflow G — Module Disable

Enable restaurant module → configure restaurant → complete orders → disable restaurant module after dependency and operational checks → remove operational menus → preserve records and reports → verify other POS workflows remain operational.

## Workflow H — SaaS Onboarding

Register → choose plan → create business → select business type → configure modules → create branch → add users → import products → configure register → complete first sale.

---

# 39. README.MD — COMPLETE PRODUCT DOCUMENTATION

Create a comprehensive README.md.

It must explain the actual implemented application, not merely proposed features.

Required sections:

1. Product introduction.
2. Project vision.
3. Screenshots.
4. Feature overview.
5. Retail features.
6. Restaurant features.
7. Offline POS.
8. Multi-branch architecture.
9. SaaS architecture.
10. Module system.
11. Business presets.
12. Supported technologies.
13. System requirements.
14. Installation.
15. Local development.
16. Environment configuration.
17. Database setup.
18. Migrations.
19. Seeders.
20. Demo accounts.
21. Demo scenarios.
22. Module configuration.
23. Permissions.
24. API documentation.
25. Payment configuration.
26. AI configuration.
27. Attendance integrations.
28. PDF generation.
29. Hardware support.
30. Offline synchronization.
31. Security.
32. Testing.
33. Performance.
34. Production deployment.
35. Scheduled jobs.
36. Queue workers.
37. Backup and recovery.
38. Troubleshooting.
39. Architecture decisions.
40. Development roadmap.
41. Feature completion matrix.
42. Known limitations.
43. License.
44. Support information.

Create additional documentation:

- docs/ARCHITECTURE.md
- docs/DATABASE.md
- docs/MODULES.md
- docs/OFFLINE.md
- docs/SECURITY.md
- docs/API.md
- docs/DEPLOYMENT.md
- docs/DEMO.md
- docs/TESTING.md
- docs/INTEGRATIONS.md
- docs/HARDWARE.md
- docs/OPERATIONS.md
- docs/FEATURE_MATRIX.md

In the feature matrix, distinguish:

- Fully implemented and tested.
- Implemented with limited capabilities.
- Requires external credentials or hardware.
- Planned or not implemented.

Never mark an incomplete feature as complete.

---

# 40. DEPLOYMENT AND DEVOPS

Provide production deployment support.

Include:

- Example environment configuration.
- Docker development configuration.
- Docker Compose for local development.
- Nginx or equivalent deployment configuration.
- PHP-FPM or supported runtime.
- Database.
- Redis.
- Queue workers.
- Scheduler.
- Storage configuration.
- HTTPS.
- CI/CD workflow.
- Database migration strategy.
- Backup process.
- Restore procedure.
- Health check.
- Monitoring.
- Error reporting.
- Structured logging.
- Deployment rollback strategy.

Provide deployment documentation for:

- VPS.
- Docker-based hosting.
- Compatible cloud platforms.

Do not assume shared hosting supports every component required by queues, offline services, and real-time integrations.

---

# 41. GIT AUTHOR CONFIGURATION

Use the following Git identity for project commits:

```bash
git config user.name "Imran Ahmed"
git config user.email "me@imrandev.bd"
```

Project website:

https://imrandev.bd

Before commits, verify:

```bash
git config user.name
git config user.email
```

Do not use AI agent identities for authored commits.

Preserve existing Git history.

Do not create commits automatically unless the environment and task authorize committing.

---

# 42. RECOMMENDED APPLICATION STRUCTURE

Use a clear modular directory structure.

Suggested:

```text
app/
  Domain/
    Core/
    Tenancy/
    Companies/
    Branches/
    Modules/
    Authentication/
    Products/
    Pricing/
    Inventory/
    Sales/
    RetailPOS/
    RestaurantPOS/
    Purchases/
    Suppliers/
    Customers/
    Loyalty/
    Accounting/
    HR/
    Attendance/
    Ecommerce/
    Delivery/
    Manufacturing/
    AI/
    Reports/
    Payments/
    Integrations/
    OfflineSync/
    Notifications/

  Filament/
    Platform/
    Tenant/
    Branch/

  Http/
    Controllers/
    Middleware/
    Requests/
    Resources/

  Policies/
  Jobs/
  Events/
  Listeners/
  Providers/
  Support/

bootstrap/
config/
database/
  migrations/
  factories/
  seeders/

resources/
  views/
    marketing/
    pos/
    restaurant/
    pdf/
  js/
    pos/
    offline/
    restaurant/
  css/

routes/
  web.php
  api.php

public/
  manifest.webmanifest

tests/
  Unit/
  Feature/
  Integration/
  Browser/

docs/
```

Treat this as a suggested organization.

Use Laravel and Filament conventions where they produce a clearer or more maintainable implementation.

---

# 43. IMPLEMENTATION PHASES

Work through these phases in order, while ensuring each completed phase remains functional.

## Phase 1 — Repository Audit and Foundation

- Inspect repository.
- Identify existing functionality.
- Verify package compatibility.
- Establish architecture.
- Install framework.
- Configure database.
- Configure authentication.
- Configure testing.
- Configure CI.
- Document decisions.

## Phase 2 — Tenant and Module Engine

- Multi-tenancy.
- Companies.
- Branches.
- Roles.
- Permissions.
- Module registry.
- Module activation.
- Business presets.
- Subscription entitlements.

## Phase 3 — Core Commerce

- Products.
- Categories.
- Customers.
- Suppliers.
- Pricing.
- Taxes.
- Inventory ledger.
- Purchase receiving.

## Phase 4 — Retail POS

- Register management.
- Fast cashier UI.
- Cart.
- Checkout.
- Payments.
- Receipts.
- Shifts.
- Refunds.
- Returns.

## Phase 5 — Offline POS

- PWA.
- IndexedDB.
- Offline cache.
- Sync protocol.
- Idempotency.
- Conflict detection.
- Recovery testing.

## Phase 6 — Restaurant Operations

- Menu.
- Modifiers.
- Tables.
- Orders.
- Kitchen.
- Reservations.
- Recipes.
- Food inventory.

## Phase 7 — Business Expansion

- Multi-warehouse.
- Procurement.
- Accounting.
- CRM.
- Loyalty.
- HR.
- Payroll.
- Delivery.
- Ecommerce.
- Manufacturing.

## Phase 8 — AI and Integrations

- AI Hub.
- AI Catalog.
- Attendance Hub.
- Payment connectors.
- Hardware adapters.
- API.
- Webhooks.

## Phase 9 — Reports and Dashboards

- Sales analytics.
- Inventory analytics.
- Restaurant analytics.
- Financial analytics.
- SaaS analytics.
- Role-specific dashboards.

## Phase 10 — Public Website

- Marketing website.
- Feature landing pages.
- Business pages.
- Pricing.
- Blog.
- Help center.
- Documentation.
- SEO.
- Public demo.

## Phase 11 — Demo and Onboarding

- Complete seeders.
- Demo tenants.
- Demo users.
- Role-based demonstrations.
- Onboarding wizard.
- Resettable demo environment.

## Phase 12 — Security and Quality

- Security tests.
- Tenant isolation tests.
- Browser tests.
- Load testing.
- Performance optimization.
- Accessibility verification.
- Dependency scans.
- Failure recovery.

## Phase 13 — Deployment

- Docker.
- Production configuration.
- CI/CD.
- Backup.
- Monitoring.
- Documentation.
- Final smoke tests.

Every phase must produce working, tested software.

Do not proceed by creating large quantities of empty scaffolding.

---

# 44. ACCEPTANCE CRITERIA

The application is ready for release only when:

- The public website works.
- Users can register.
- Users can create a business.
- Users can choose a business type.
- Users can configure modules.
- Users can create branches.
- Users can create products.
- Users can manage inventory.
- Retail users can complete real POS workflows.
- Restaurant users can complete real restaurant workflows.
- Authorized offline sales can be stored and synchronized.
- Stock movements are accurate.
- Payments are recorded correctly.
- Refunds work.
- Purchases work.
- Reports calculate accurate values.
- Roles and permissions work.
- Tenant isolation works.
- Branch isolation works.
- Optional modules can be disabled without breaking the core.
- Business presets work.
- Demo tenants exist.
- Demo users can log in.
- Demo data supports meaningful workflows.
- Public demo data is properly isolated.
- PDF documents work.
- AI modules fail gracefully when unconfigured or disabled.
- Third-party integrations report their real configuration status.
- APIs are documented.
- Test suites pass.
- Production deployment instructions work.
- README.md accurately reflects the application.

Every incomplete criterion must remain visibly open in the feature matrix.

---

# 45. MANDATORY FINAL VERIFICATION

Before declaring completion:

1. Run Composer dependency validation.
2. Verify Filament compatibility.
3. Validate every supplied package.
4. Run migrations on a clean database.
5. Run seeders.
6. Execute automated tests.
7. Execute browser workflows.
8. Verify tenant isolation.
9. Verify module toggling.
10. Verify branch permissions.
11. Verify financial calculations.
12. Verify inventory consistency.
13. Verify offline synchronization.
14. Verify PDF generation.
15. Verify public pages.
16. Verify responsive layouts.
17. Verify production build.
18. Verify API documentation.
19. Verify deployment configuration.
20. Update README.md.
21. Update feature matrix.
22. Record unresolved issues.

Provide the final engineering report with:

- Implemented modules.
- Completed workflows.
- Working routes.
- Demo accounts.
- Test results.
- Package versions.
- Deployment instructions.
- Known limitations.
- Remaining work.

Do not say that something was tested unless it was actually executed.

---

# 46. REQUIRED STARTING ACTION

Start development now.

First:

1. Inspect the entire existing project.
2. Read README.md.
3. Inspect composer.json and package-lock.json where applicable.
4. Review current database structure.
5. Review existing application architecture.
6. Check package compatibility.
7. Create a prioritized implementation checklist.
8. Implement the foundation.

Then continue through the remaining phases.

Do not stop at an architectural proposal.

Do not deliver only a list of suggestions.

Write the actual application source code, database migrations, seeders, tests, UI, documentation, and deployment configuration.

When a feature is too large for a single implementation pass, divide it into independently functional milestones, complete and verify each milestone, and maintain the remaining checklist.

Do not create fake functionality to satisfy the feature count.

The end goal is a reliable, globally competitive, professional, modular POS business platform that businesses can genuinely operate.

**Product Name: POS System**

**Tagline: One Powerful POS. Every Business. Every Branch. Online or Offline.**

**Developer: Imran Ahmed**

**Website: https://imrandev.bd**

**BEGIN IMPLEMENTATION.**
