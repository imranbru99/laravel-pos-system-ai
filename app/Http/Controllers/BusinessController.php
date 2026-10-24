<?php

namespace App\Http\Controllers;

use App\Domain\Modules\ModuleManager;
use App\Domain\Sales\Checkout;
use App\Domain\Tenancy\TenantContext;
use App\Models\Branch;
use App\Models\Company;
use App\Models\InventoryMovement;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $branches = Branch::get()->filter(fn ($branch) => $request->user()->canUseBranch($branch->id));
        $ids = $branches->pluck('id');

        return view('dashboard', ['branches' => $branches, 'products' => Product::orderBy('name')->get(), 'sales' => Sale::whereIn('branch_id', $ids)->latest()->limit(20)->get(), 'revenue' => Sale::whereIn('branch_id', $ids)->sum('total_minor'), 'movements' => InventoryMovement::whereIn('branch_id', $ids)->latest('id')->limit(20)->get(), 'tenant' => Tenant::findOrFail(app(TenantContext::class)->id()), 'modules' => app(ModuleManager::class)]);
    }

    public function product(Request $request)
    {
        abort_unless(in_array($request->user()->role, ['owner', 'manager'], true), 403);
        $data = $request->validate(['name' => 'required|string|max:150', 'sku' => 'required|string|max:80', 'price_minor' => 'required|integer|min:0|max:100000000', 'tax_bps' => 'required|integer|min:0|max:10000']);
        abort_if(Product::where('sku', $data['sku'])->exists(), 422, 'SKU already exists.');
        Product::create($data);

        return back()->with('status', 'Product created.');
    }

    public function branch(Request $request)
    {
        abort_unless($request->user()->role === 'owner', 403);
        $data = $request->validate(['name' => 'required|string|max:100']);
        Branch::create($data + ['company_id' => Company::firstOrFail()->id]);

        return back()->with('status', 'Branch created.');
    }

    public function receive(Request $request)
    {
        abort_unless(in_array($request->user()->role, ['owner', 'manager'], true), 403);
        $data = $request->validate(['branch_id' => 'required|integer', 'product_id' => 'required|integer', 'quantity' => 'required|integer|min:1|max:100000', 'reason' => 'required|string|max:150']);
        DB::transaction(function () use ($request, $data) {
            Tenant::whereKey(app(TenantContext::class)->id())->lockForUpdate()->firstOrFail();
            Branch::findOrFail($data['branch_id']);
            Product::findOrFail($data['product_id']);
            abort_unless($request->user()->canUseBranch($data['branch_id']), 403);
            InventoryMovement::create($data + ['user_id' => $request->user()->id, 'created_at' => now()]);
        });

        return back()->with('status', 'Stock received into ledger.');
    }

    public function module(Request $request, string $module)
    {
        abort_unless($request->user()->role === 'owner', 403);
        $data = $request->validate(['enabled' => 'required|boolean']);
        app(ModuleManager::class)->set($module, (bool) $data['enabled'], $request->user()->id);

        return back()->with('status', 'Module configuration updated. Historical records preserved.');
    }

    public function pos(Request $request)
    {
        abort_unless(app(ModuleManager::class)->isEnabled('sales'), 403);

        return view('pos.index', ['products' => Product::where('active', true)->get(), 'branches' => Branch::get()->filter(fn ($branch) => $request->user()->canUseBranch($branch->id)), 'currency' => Tenant::findOrFail(app(TenantContext::class)->id())->currency]);
    }

    public function checkout(Request $request, Checkout $checkout)
    {
        $data = $request->validate(['client_id' => 'required|uuid', 'branch_id' => 'required|integer', 'tendered_minor' => 'required|integer|min:0|max:1000000000000', 'items' => 'required|array|min:1|max:100', 'items.*.product_id' => 'required|integer', 'items.*.quantity' => 'required|integer|min:1|max:10000']);
        $sale = $checkout->execute($request->user(), $data);

        return response()->json(['id' => $sale->id, 'total_minor' => $sale->total_minor, 'receipt' => url('/receipts/'.$sale->id)]);
    }

    public function receipt(Request $request, int $id)
    {
        $sale = Sale::findOrFail($id);
        abort_unless($request->user()->canUseBranch($sale->branch_id), 403);

        return view('pos.receipt', ['sale' => $sale->load('items')]);
    }
}
