<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'featuredProducts']);

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/details/{product}', [ProductController::class, 'show'])->name('products.show');