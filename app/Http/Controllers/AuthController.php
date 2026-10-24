<?php

namespace App\Http\Controllers;

use App\Domain\Modules\ModuleManager;
use App\Domain\Tenancy\TenantContext;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

final class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate(['email' => 'required|email', 'password' => 'required|string']);
        if (! Auth::attempt($data)) {
            throw ValidationException::withMessages(['email' => 'The credentials do not match.']);
        }
        $request->session()->regenerate();

        return redirect()->intended('/app');
    }

    public function register(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:100', 'business' => 'required|string|max:150', 'email' => 'required|email|max:255|unique:users', 'password' => ['required', 'confirmed', Password::min(12)]]);
        $user = DB::transaction(function () use ($data) {
            $tenant = Tenant::create(['name' => $data['business']]);
            $user = new User(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make($data['password'])]);
            $user->tenant_id = $tenant->id;
            $user->role = 'owner';
            $user->save();
            app(TenantContext::class)->set($user);
            $company = Company::create(['name' => $data['business']]);
            Branch::create(['name' => 'Main branch', 'company_id' => $company->id]);
            app(ModuleManager::class)->set('sales', true, $user->id);
            app(ModuleManager::class)->set('reports', true, $user->id);

            return $user;
        });
        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/app');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
