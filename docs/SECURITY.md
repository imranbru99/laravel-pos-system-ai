# Security

Session authentication, CSRF middleware, login/registration throttles, hashed passwords and session regeneration protect web forms. Password registration minimum is 12 characters. Production requires TLS, secure session cookies, APP_DEBUG=false, a private APP_KEY and restricted database/Redis networks.

Tenant-owned Eloquent queries fail without context. Never call `withoutGlobalScopes()` in business controllers. Derive tenant identity from authenticated users, never request input. Verify all related IDs through scoped models; branch membership is checked for stock, checkout and receipts. Filament product policy restricts managers/owners and disables deletion. Permission expansion, reset, email verification, MFA, audit export, API scopes and privileged platform administration remain pending.

Demo seeding refuses environments other than local/testing and requires an environment-supplied password. No production secrets committed. No external AI or payment calls are made. Package diagnostics are not enabled; tenant-private telemetry must never be exposed through ordinary authenticated access.

Tests cover cross-tenant product/branch/receipt IDs, absent context, suspended tenants, cashier administration denial, insufficient stock and underpayment rollback. These checks are not a full security certification or penetration test.
