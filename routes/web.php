<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Models\Product;

// 1. Home Page - Displays all products
Route::get('/', function () {
    return view('welcome', ['products' => Product::all()]);
});

// 2. Cart Management
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::get('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// 3. Payment Flow
// This shows the fake credit card form
Route::get('/payment', function () {
    if(!session('cart')) return redirect('/');
    return view('cart.payment');
})->name('cart.payment');

// This processes the checkout (clears the cart)
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// This shows the final "Thank You" message
Route::get('/payment-success', [CartController::class, 'success'])->name('cart.success');