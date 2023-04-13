<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShoppingCart;
use App\Http\Middleware\LocaleCookieMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('prueba', function () {
    return view('livewire.cookie-consent');
});
Route::get('/', WelcomeController::class);

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');
Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');
Route::get('search', SearchController::class)->name('search');

Route::post('webhooks', WebhooksController::class);

// Localization Route
Route::get('/locale/{lange}', [LocalizationController::class, 'setLang'])->name('locale');

Route::middleware(LocaleCookieMiddleware::class)->group(function () {
});
