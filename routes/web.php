<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{product}', [ShopController::class, 'show'])->name('shop.show');
Route::post('/cart/add/{product}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::get('/cart/remove/{id}', [ShopController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [ShopController::class, 'checkout'])->name('checkout');