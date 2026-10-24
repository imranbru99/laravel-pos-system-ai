<?php

namespace App\Models;

use App\Domain\Tenancy\TenantContext;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class TenantModel extends Model
{
    protected $guarded = ['id', 'tenant_id'];

    protected static function booted(): void
    {
        static::addGlobalScope('tenant', fn (Builder $query) => $query->where($query->getModel()->qualifyColumn('tenant_id'), app(TenantContext::class)->id()));
        static::creating(function (Model $model) {
            $model->tenant_id = app(TenantContext::class)->id();
        });
    }
}
