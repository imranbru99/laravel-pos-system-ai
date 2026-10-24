# Operations

Run a supervised `php artisan queue:work --tries=3` and `php artisan schedule:work` (or cron schedule:run once a minute, not both). This milestone has no business scheduled workloads. Laravel logs structured context in storage/logs; never log credentials or raw payment data. Choose an error-monitoring provider only after a privacy review.

Back up PostgreSQL with `pg_dump` in custom format and private storage with an encrypted snapshot. Retain APP_KEY in a separate secure secret backup. Record backup timestamps, app image and schema version. Restore into an isolated database with `pg_restore`, restore storage and key, boot the corresponding app image, and verify login, tenant boundaries, stock sums and sale totals before traffic. Restore drills and automatic backup scripts are not yet implemented/tested.

Troubleshooting: missing Vite manifest → npm ci && npm run build. Missing Filament assets → php artisan filament:assets. 403 business context → check user tenant, active status and branch membership. Module disable validation → disable dependents first. Stock shortage → inspect movement ledger rather than altering products. Uncertain checkout → same-tab retry; do not submit a new UUID until resolved. Integration status is documented in INTEGRATIONS.md.
