# Local demonstrations

Set a unique local `DEMO_PASSWORD` (at least 12 characters), then run `php artisan db:seed`. Seeder only permits local/testing environments. Accounts: `retail@demo.pos.test` (Demo Retail Store) and `minimal@demo.pos.test` (Demo Small Shop), both owners. Six sample products each have opening stock of 40 in their own branch. Seeding skips accounts already present and does not reset passwords or existing data.

Alternatively use `/register` to create your own business. Add a product (e.g. price 12500 = BDT 125.00, tax 500 = 5%), receive stock, open POS, add products, enter cash in minor units, complete sale and open receipt. Inspect workspace stock movements and sales. Disable reports then sales to exercise module controls; receipts remain available.

Other requested demo roles/businesses, selector and disposable public reset environment are pending. Never expose this local dataset as a production public demo. A separate Browser Test Shop was created solely for local UI verification; its account is not a supported demo login.
