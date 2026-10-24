<?php

namespace App\Models;

class InventoryMovement extends TenantModel
{
    public $timestamps = false;

    protected static function booted(): void
    {
        parent::booted();
        static::updating(fn () => throw new \LogicException('Append-only record.'));
        static::deleting(fn () => throw new \LogicException('Append-only record.'));
    }
}
