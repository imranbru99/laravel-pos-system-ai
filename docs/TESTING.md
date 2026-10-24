# Verification

Executed on 24 October 2026 with PHP 8.5.4 and SQLite in-memory feature databases. `php artisan test` covers business creation, exact tax/stock posting, duplicate checkout replay, changed-payload rejection, insufficient stock and cash rollback, tenant object isolation, branch denial, suspended tenant denial, module dependencies, immutable ledger model hooks, Filament catalog rendering and Unicode slug integration. No test was disabled.

Manual in-app-browser workflow executed against localhost: register Browser Test Shop → add Browser Tea at 12500 minor units → receive 10 units → cash sale of one unit with 20000 tender → receipt total 125.00 / change 75.00. Screenshot: screenshots/receipt.png. Narrow 653 px viewport was visually inspected; full mobile/tablet/desktop accessibility and print-device verification remain pending.

Commands: `composer validate --strict`, `vendor/bin/pint --test`, `php artisan test`, `npm ci && npm run build`, `php artisan route:list`, `php artisan migrate` on a clean isolated database, `composer audit`, `docker compose config --quiet` with DB_PASSWORD set.

SQLite tests do not prove production concurrent locking behavior. MySQL/Postgres contention, browser reload recovery, offline sync, PDFs, provider sandbox, physical hardware, load tests, and Docker runtime checks remain unexecuted. CI configuration is supplied; remote CI has not run.

Final checks: 15 tests passed (51 assertions); Composer strict validation, platform requirements and advisory audit passed; Pint passed; Vite production build passed; migrations and two-tenant demo seeding executed on a new isolated SQLite database. Docker/Compose verification was attempted but blocked before configuration parsing: Docker delegates to Podman, whose runtime directory was read-only. No container result is claimed.

README screenshot review follow-up: fixed authenticated homepage navigation context; added regression coverage. Latest suite: 16 tests, 53 assertions, passed.
