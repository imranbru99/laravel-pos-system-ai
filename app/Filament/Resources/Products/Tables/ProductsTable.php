<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(), TextColumn::make('sku')->searchable(),
            TextColumn::make('price_minor')->label('Price (minor units)')->numeric()->sortable(),
            TextColumn::make('tax_bps')->label('Tax (basis points)'), IconColumn::make('active')->boolean(),
        ])->recordActions([EditAction::make()]);
    }
}
