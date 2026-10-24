<?php

namespace Tests\Feature;

use App\Domain\Modules\ModuleManager;
use App\Domain\Tenancy\TenantContext;
use App\Models\Branch;
use App\Models\Company;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

final class CommerceTest extends TestCase
{
    use RefreshDatabase;

    private function business(string $email = 'owner@example.test'): array
    {
        $tenant = Tenant::create(['name' => 'Test business']);
        $user = User::factory()->create(['tenant_id' => $tenant->id, 'role' => 'owner', 'email' => $email]);
        app(TenantContext::class)->set($user);
        $company = Company::create(['name' => 'Company']);
        $branch = Branch::create(['name' => 'Branch', 'company_id' => $company->id]);
        $product = Product::create(['name' => 'Tea', 'sku' => 'TEA', 'price_minor' => 105, 'tax_bps' => 500]);
        InventoryMovement::create(['branch_id' => $branch->id, 'product_id' => $product->id, 'quantity' => 10, 'reason' => 'opening', 'user_id' => $user->id, 'created_at' => now()]);
        app(ModuleManager::class)->set('sales', true, $user->id);

        return [$user, $branch, $product];
    }

    private function payload(Branch $branch, Product $product): array
    {
        return ['client_id' => (string) Str::uuid(), 'branch_id' => $branch->id, 'tendered_minor' => 1000, 'items' => [['product_id' => $product->id, 'quantity' => 2]]];
    }

    public function test_checkout_posts_exact_tax_stock_and_idempotent_receipt(): void
    {
        [$user,$branch,$product] = $this->business();
        $payload = $this->payload($branch, $product);
        $response = $this->actingAs($user)->postJson('/checkout', $payload)->assertOk()->assertJsonPath('total_minor', 221);
        $this->postJson('/checkout', $payload)->assertOk()->assertJsonPath('id', $response->json('id'));
        $this->assertDatabaseCount('sales', 1);
        $this->assertDatabaseCount('sale_items', 1);
        $this->assertSame(8, (int) InventoryMovement::where('product_id', $product->id)->sum('quantity'));
        $this->get('/receipts/'.$response->json('id'))->assertOk()->assertSee('Thank you.');
    }

    public function test_idempotency_key_cannot_be_reused_for_different_payload(): void
    {
        [$user,$branch,$product] = $this->business();
        $payload = $this->payload($branch, $product);
        $this->actingAs($user)->postJson('/checkout', $payload)->assertOk();
        $payload['items'][0]['quantity'] = 3;
        $this->postJson('/checkout', $payload)->assertStatus(409);
        $this->assertDatabaseCount('sales', 1);
    }

    public function test_insufficient_stock_and_underpayment_leave_no_sale(): void
    {
        [$user,$branch,$product] = $this->business();
        $payload = $this->payload($branch, $product);
        $payload['items'][0]['quantity'] = 11;
        $this->actingAs($user)->postJson('/checkout', $payload)->assertUnprocessable();
        $payload['items'][0]['quantity'] = 2;
        $payload['tendered_minor'] = 220;
        $this->postJson('/checkout', $payload)->assertUnprocessable();
        $this->assertDatabaseCount('sales', 0);
        $this->assertDatabaseCount('inventory_movements', 1);
    }

    public function test_cross_tenant_product_branch_and_receipt_access_are_denied(): void
    {
        [$alice,$branchA,$productA] = $this->business();
        $sale = $this->actingAs($alice)->postJson('/checkout', $this->payload($branchA, $productA))->assertOk()->json('id');
        [$bob,$branchB,$productB] = $this->business('bob@example.test');
        $this->actingAs($bob)->postJson('/checkout', $this->payload($branchB, $productA))->assertNotFound();
        $this->postJson('/checkout', $this->payload($branchA, $productB))->assertNotFound();
        $this->get('/receipts/'.$sale)->assertNotFound();
        $this->get('/app')->assertOk();
    }

    public function test_cashier_branch_and_management_access_are_restricted(): void
    {
        [$user,$branch,$product] = $this->business();
        $user->role = 'cashier';
        $user->save();
        $this->actingAs($user)->postJson('/checkout', $this->payload($branch, $product))->assertForbidden();
        $this->post('/products', ['name' => 'Bypass'])->assertForbidden();
        $this->post('/modules/sales', ['enabled' => 0])->assertForbidden();
        $this->get('/admin')->assertForbidden();
    }

    public function test_module_dependency_disable_preserves_history_and_denies_checkout(): void
    {
        [$user,$branch,$product] = $this->business();
        app(ModuleManager::class)->set('reports', true, $user->id);
        $this->actingAs($user)->post('/modules/sales', ['enabled' => 0])->assertSessionHasErrors('module');
        $this->post('/modules/reports', ['enabled' => 0])->assertRedirect();
        $this->post('/modules/sales', ['enabled' => 0])->assertRedirect();
        $this->get('/pos')->assertForbidden();
        $this->postJson('/checkout', $this->payload($branch, $product))->assertForbidden();
        $this->assertDatabaseCount('inventory_movements', 1);
    }

    public function test_suspended_business_is_rejected(): void
    {
        [$user,$branch,$product] = $this->business();
        Tenant::whereKey($user->tenant_id)->update(['active' => false]);
        $this->actingAs($user)->postJson('/checkout', $this->payload($branch, $product))->assertForbidden();
    }

    public function test_missing_tenant_context_fails_closed(): void
    {
        $this->expectException(HttpException::class);
        Product::count();
    }

    public function test_registration_creates_isolated_business_and_first_branch(): void
    {
        $this->post('/register', ['name' => 'New Owner', 'business' => 'New Shop', 'email' => 'new@example.test', 'password' => 'a-secure-test-password', 'password_confirmation' => 'a-secure-test-password'])->assertRedirect('/app');
        $this->assertAuthenticated();
        $this->assertDatabaseCount('tenants', 1);
        $this->assertDatabaseCount('branches', 1);
        $this->get('/app')->assertOk()->assertSee('New Shop');
    }

    public function test_ledger_records_cannot_be_edited_through_models(): void
    {
        $this->business();
        $record = InventoryMovement::firstOrFail();
        $this->expectException(\LogicException::class);
        $record->update(['quantity' => 99]);
    }

    public function test_filament_catalog_renders_only_for_business_admin(): void
    {
        [$user] = $this->business();
        $this->actingAs($user)->get('/admin/products')->assertOk();
        $this->get('/admin/products/create')->assertOk();
    }

    public function test_posted_sale_is_immutable(): void
    {
        [$user, $branch, $product] = $this->business();
        $id = $this->actingAs($user)->postJson('/checkout', $this->payload($branch, $product))->assertOk()->json('id');
        $sale = Sale::findOrFail($id);
        $this->expectException(\LogicException::class);
        $sale->update(['total_minor' => 0]);
    }

    public function test_authenticated_user_can_view_public_homepage_without_business_context(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get('/')->assertOk()->assertSee('A better day');
    }
}
