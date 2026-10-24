<?php

namespace App\Http\Middleware;

use App\Domain\Tenancy\TenantContext;
use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;

final class BusinessContext
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless($request->user()?->tenant_id, 403);
        abort_unless(Tenant::whereKey($request->user()->tenant_id)->where('active', true)->exists(), 403, 'Business suspended.');
        app(TenantContext::class)->set($request->user());

        return $next($request);
    }
}
