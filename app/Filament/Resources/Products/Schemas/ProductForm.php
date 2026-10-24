<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Domain\Tenancy\TenantContext;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

final class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(150),
            TextInput::make('sku')->required()->maxLength(80)->rules(fn ($record) => [Rule::unique('products', 'sku')->where('tenant_id', app(TenantContext::class)->id())->ignore($record?->id)]),
            TextInput::make('price_minor')->label('Price in minor units')->required()->integer()->minValue(0)->maxValue(100000000),
            TextInput::make('tax_bps')->label('Tax in basis points')->required()->integer()->minValue(0)->maxValue(10000)->default(0),
            Toggle::make('active')->default(true),
        ]);
    }
}
