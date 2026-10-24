# Package integration review

Reviewed 24 October 2026 using Packagist metadata and README at the exact referenced source commit. PHP/Laravel constraints are nominally compatible with Laravel 12; only installed dependencies have passed the actual Composer solver here. Development branches have no stable release guarantee; composer.lock fixes the installed source reference. Upgrade deliberately after re-auditing.

| Package | Observed reference | Runtime status |
|---|---|---|
| imrandevbd/drutogoti | `6c5b4c94bf42e350d5b06c88736dcbf2b8e199f1` (dev-main) | Not installed; integration pending |
| imrandevbd/laravel-admin-panel | `67305195926b7e151f8cb061a1765d23645098a1` (dev-main) | Not installed; integration pending |
| imrandevbd/laravel-ai-catalog | `07b5783f3ec08ed61cad9c1ea3439ae9b4e15c25` (dev-main) | Not installed; integration pending |
| imrandevbd/laravel-ai-hub | `5fc1bf2e13b663a3646af57b2416c1f214951c04` (dev-main) | Not installed; integration pending |
| imrandevbd/laravel-attendance-hub | `7bd5a7b4a9b27687e9c060a17544fe359d6ce74c` (dev-main) | Not installed; integration pending |
| imrandevbd/laravel-unicode-pdf | `bc0288d3422728a88d81280124fd193050929982` (dev-main) | Not installed; integration pending |
| imrandevbd/laravel-universal-slug | `9fdcf1659a514e94e7ac58b17ec783e73003fb7b` (dev-main) | Installed, configured, ProductSlug adapter and integration test |

AI Hub also publishes v1.6.0; its stable implementation and provider flows still require focused review before installation. The other six packages had no tagged stable release in the metadata observed. Package source is not vendored or modified; reviewed third-party authorship remains untouched.

## Administration package conflict

Inspected AdminPanelServiceProvider, routes/web.php, config/admin-panel.php, SetAdminPanelContext, controller and file inventory at 6730519. The provider registers a default panel at `/admin`, overlapping Filament. Its default middleware is `web`; context middleware chooses a panel, not tenant authorization. Auth settings in config do not by themselves enforce application policies. The inspected source contains no migration directory or complete RBAC implementation; its own README lists fluent CRUD as pending. Assets use the package dist directory, asset-serving fallback and publish command, independent of Filament assets. Do not auto-discover this provider into this application. Any future reuse needs a provider-free adapter or a distinct protected namespace and explicit authorization tests. Filament remains primary.

## Profiling

Drutogoti source/config and README inspected. Disabled by default, dashboard defaults to ordinary web/auth and telemetry needs tenant/privacy review. Production integration must guard platform-only diagnostics, minimize/redact SQL bindings, exclude authentication/checkout bodies, use documented sampling (e.g. 0.01), retention and queue configuration, then add integration tests. It is intentionally not enabled or presented as production-safe yet.

## Slugs

Uses documented `ImranDev\UniversalSlug\Facades\UniversalSlug::of()->onlySlug()->maxLength()->toString()` through ProductSlug. `config/universal-slug.php` preserves Unicode, disables random suffixes and scheduled history pruning. Database tenant/slug uniqueness backs the adapter collision check; simultaneous same-name creates may require retry after uniqueness rejection. Existing rows backfill product-ID slugs. No public product catalog or redirect history is claimed.

## Remaining integrations

AI Catalog: draft/review/provenance/duplicate controls required before touching products. AI Hub: explicit tenant opt-in, permission, usage/cost limits and redaction before external calls. Attendance: manual fallback/device protocol tests required. Unicode PDF: choose/test a supported engine and multilingual font set, then build all print layouts. No PDF or provider capability is fabricated. These are documented pending integrations, not incompatible packages declared complete.
