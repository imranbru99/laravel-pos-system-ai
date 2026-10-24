<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Middleware\BusinessContext;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:6,1');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:3,1');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::middleware(['auth', BusinessContext::class])->group(function () {
    Route::get('/app', [BusinessController::class, 'index']);
    Route::post('/products', [BusinessController::class, 'product']);
    Route::post('/branches', [BusinessController::class, 'branch']);
    Route::post('/inventory/receive', [BusinessController::class, 'receive']);
    Route::post('/modules/{module}', [BusinessController::class, 'module']);
    Route::get('/pos', [BusinessController::class, 'pos']);
    Route::post('/checkout', [BusinessController::class, 'checkout'])->middleware('throttle:60,1');
    Route::get('/receipts/{id}', [BusinessController::class, 'receipt']);
});
