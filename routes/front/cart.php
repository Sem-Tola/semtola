<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/cart', [CartController::class,'index'])
    ->name(name: 'cart');

Route::post('/checkout', function () {
    // For now just redirect back with a fake success message
    return redirect()->route('cart')->with('success', 'Your payment is being processed!');
})->name('checkout.process');

// web.php
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');