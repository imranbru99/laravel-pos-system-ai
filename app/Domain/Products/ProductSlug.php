<?php

namespace App\Domain\Products;

use App\Models\Product;
use ImranDev\UniversalSlug\Facades\UniversalSlug;

final class ProductSlug
{
    public function generate(string $name): string
    {
        $base = UniversalSlug::of($name)->onlySlug()->maxLength(160)->toString();
        $slug = $base;
        $suffix = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $base.'-'.++$suffix;
        }

        return $slug;
    }
}
