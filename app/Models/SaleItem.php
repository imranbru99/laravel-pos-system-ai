<?php

namespace App\Models;

class SaleItem extends TenantModel
{
    public $timestamps = false;

    protected static function booted(): void
    {
        parent::booted();
        static::updating(fn () => throw new \LogicException('Posted sale items are immutable.'));
        static::deleting(fn () => throw new \LogicException('Posted sale items are immutable.'));
    }
}
