<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Bagian Halaman Utama
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');
Route::get('/details/{id}', [DetailController::class, 'index'])
    ->name('detail');
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');
Route::get('/success', [CartController::class, 'success'])
    ->name('success');

// Bagian Register
Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

// Bagian Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Dashboard Product
Route::get('/dashboard/products', [DashboardProductController::class, 'index'])
    ->name('dashboard-products');
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])
    ->name('dashboard-products-create');
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])
    ->name('dashboard-products-details');

// Dashboard Transactions
Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])
    ->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])
    ->name('dashboard-transaction-details');

// Dashboard Settings
Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])
    ->name('dashboard-settings-store');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])
    ->name('dashboard-settings-account');

Auth::routes();