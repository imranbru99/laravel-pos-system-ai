<?php

namespace Database\Seeders;

use App\Domain\Modules\ModuleManager;
use App\Domain\Tenancy\TenantContext;
use App\Models\Branch;
use App\Models\Company;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('demo.password');
        if (! app()->environment(['local', 'testing']) || ! is_string($password) || strlen($password) < 12) {
            throw new \RuntimeException('Demo seeding requires local/testing and DEMO_PASSWORD with at least 12 characters.');
        }
        DB::transaction(function () use ($password) {
            foreach (['retail' => 'Demo Retail Store', 'minimal' => 'Demo Small Shop'] as $preset => $name) {
                if (User::where('email', $preset.'@demo.pos.test')->exists()) {
                    continue;
                }
                $tenant = Tenant::create(['name' => $name, 'preset' => $preset]);
                $owner = new User(['name' => 'Demo Owner', 'email' => $preset.'@demo.pos.test', 'password' => Hash::make($password)]);
                $owner->tenant_id = $tenant->id;
                $owner->role = 'owner';
                $owner->save();
                app(TenantContext::class)->set($owner);
                $company = Company::create(['name' => $name]);
                $branch = Branch::create(['company_id' => $company->id, 'name' => 'Main branch']);
                app(ModuleManager::class)->set('sales', true, $owner->id);
                if ($preset === 'retail') {
                    app(ModuleManager::class)->set('reports', true, $owner->id);
                }
                foreach ([['Bengal black tea', 'TEA-001', 18000], ['Organic whole milk', 'MILK-001', 9500], ['Sourdough bread', 'BREAD-001', 22000], ['Roasted coffee beans', 'COFFEE-001', 65000], ['Wildflower honey', 'HONEY-001', 42000], ['Oat biscuits', 'BISCUIT-001', 12000]] as [$name,$sku,$price]) {
                    $product = Product::create(['name' => $name, 'sku' => $sku, 'price_minor' => $price, 'tax_bps' => 500]);
                    InventoryMovement::create(['branch_id' => $branch->id, 'product_id' => $product->id, 'quantity' => 40, 'reason' => 'Demo opening stock', 'user_id' => $owner->id, 'created_at' => now()]);
                }
            }
        });
    }
}
