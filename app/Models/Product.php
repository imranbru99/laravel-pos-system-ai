<?php

namespace App\Models;

use App\Domain\Products\ProductSlug;

class Product extends TenantModel
{
    protected static function booted(): void
    {
        parent::booted();
        static::creating(function (Product $product) {
            $product->slug = app(ProductSlug::class)->generate($product->name);
        });
    }
}
