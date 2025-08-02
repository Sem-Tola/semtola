<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


Route::post('/checkout', function () {
    // For now just redirect back with a fake success message
    return redirect()->route('cart')->with('success', 'Your payment is being processed!');
})->name('checkout.process');

// web.php

// Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');