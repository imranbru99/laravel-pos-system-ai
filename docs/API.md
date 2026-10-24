# HTTP interface

Current surface is session-authenticated web routes, protected by CSRF. `php artisan route:list --except-vendor` lists these routes. Public GET: `/`, `/login`, `/register`; POST `/login`, `/register`. Authenticated POST `/logout`.

Business GET: `/app`, `/pos`, `/receipts/{id}`. Owner/manager POST `/products`, `/inventory/receive`. Owner POST `/branches`, `/modules/{module}`. Filament administration `/admin`, `/admin/products`.

POST `/checkout` accepts JSON with `client_id` (UUID), `branch_id`, `tendered_minor`, `items` array of `product_id` and integer `quantity`. Same-origin browser must send the CSRF token and session cookie. Response: `{id,total_minor,receipt}`. Validation 422; forbidden 403; scoped missing object 404; idempotency mismatch 409. All server totals are authoritative.

Sanctum 4 is installed but tokens/endpoints/scopes are not implemented. There is no `/api/v1` contract or OpenAPI document yet. Do not integrate external clients against this internal web interface.
