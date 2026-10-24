# Offline status

Offline sales are **not implemented**. The current cart is in memory, and checkout requires a connection. No service worker or fake sync queue is provided. Do not close the tab after an uncertain checkout response: retry in the same tab, which freezes the transaction payload and reuses its UUID. The server returns the original sale when the exact payload repeats; conflicting payloads return 409.

Browser reload/crash recovery is not supported. The UI warns on leaving with an unacknowledged request. Before deploying to real cashiers, implement durable IndexedDB transactions, online-issued device authorization and expiry, versioned catalogs/prices/taxes, risk thresholds, tamper-aware reconciliation, supervisor conflicts, quota checks, revocation on reconnect, and the full failure suite in PRODUCT_REQUIREMENTS.md. No card data is collected or stored.
