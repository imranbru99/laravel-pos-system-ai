# Deployment

This is a foundation build, not release-ready software. Deploy only to development/staging until the open acceptance criteria are complete.

## Local

PHP 8.3+ with Composer, intl, mbstring, PDO SQLite (or PDO PostgreSQL/MySQL), XML and zip; Node 22+. Locked dependency versions were executed with PHP 8.5.4. The current Filament transitive lock includes Symfony 8 components; use PHP 8.5 to match verification, and let Composer reject incompatible hosts rather than ignoring platform checks.

```
cp .env.example .env
composer install
php artisan key:generate
php -r "touch('database/database.sqlite');"
php artisan migrate
npm ci
npm run build
php artisan serve
```

Set APP_URL to the correct local URL. Register a new account or configure local DEMO_PASSWORD and seed.

## Docker staging

Set APP_KEY via `php artisan key:generate` before starting; set DB_PASSWORD in .env to a strong nonempty password. Set APP_ENV=staging, APP_DEBUG=false, APP_URL to the TLS URL, SESSION_SECURE_COOKIE=true. Do not seed staging.

```
docker compose config --quiet
docker compose build
docker compose up -d db redis
docker compose run --rm app php artisan migrate --force
docker compose up -d
```

Nginx binds localhost:8080, PHP-FPM remains private. Terminate HTTPS with a configured upstream proxy; configure trusted proxies before relying on forwarded headers. Web image copies static assets from the same application image. Persistent database and storage volumes hold state. App, queue and scheduler share configuration and storage. Redis is private. `/up` is Laravel liveness, not a comprehensive database/queue readiness check.

Docker images, migrations on MySQL/Postgres, SSL/proxy setup and queue recovery have not been executed here. Test them in staging. For VPS, use the same PHP extensions, restricted DB/Redis, document root public/, long-running supervised queue worker and one scheduler process. A cloud host must support workers, scheduler, persistent private storage and the same networking constraints. Shared hosting suitability is unverified.

## Release and rollback

Build immutable images, back up database/storage/key securely, run tests, stage migrations, then switch traffic. Run `queue:restart` after app deployment. Do not run optimize with build-time secrets. Cache configuration after environment injection. Use expand/contract migrations; never roll back financial tables destructively. Roll back app image only if schema is backward-compatible; restore from a verified backup when necessary with an explicit outage/reconciliation plan. See OPERATIONS.md.
