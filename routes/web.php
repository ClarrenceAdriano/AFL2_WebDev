<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'featuredProducts']);

Route::get('/Products', [ProductController::class, 'showProducts']);

Route::get('/AboutUs', function () {
    return view('aboutUs');
});

Route::get('/Contact', function () {
    return view('contact');
});

Route::get('/details/{product}', [ProductController::class, 'show'])->name('products.show');