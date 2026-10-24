<?php

namespace Tests\Feature;

use App\Domain\Products\ProductSlug;
use App\Domain\Tenancy\TenantContext;
use App\Models\Product;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SlugIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_unicode_slug_adapter_preserves_bengali_and_scopes_collisions(): void
    {
        $tenant = Tenant::create(['name' => 'Shop']);
        $user = User::factory()->create(['tenant_id' => $tenant->id]);
        app(TenantContext::class)->set($user);
        $a = Product::create(['name' => 'বাংলা চা', 'sku' => 'A', 'price_minor' => 100]);
        $b = Product::create(['name' => 'বাংলা চা', 'sku' => 'B', 'price_minor' => 100]);
        $this->assertSame('বাংলা-চা', $a->slug);
        $this->assertSame('বাংলা-চা-2', $b->slug);
        $this->assertSame('hello-world', app(ProductSlug::class)->generate('Hello World'));
    }
}
