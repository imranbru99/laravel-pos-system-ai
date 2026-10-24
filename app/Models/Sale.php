<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends TenantModel
{
    protected static function booted(): void
    {
        parent::booted();
        static::updating(fn () => throw new \LogicException('Posted sales are immutable.'));
        static::deleting(fn () => throw new \LogicException('Posted sales are immutable.'));
    }

    public function items(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }
}
