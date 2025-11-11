<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ProductController::class, 'featuredProducts'])->name('home');
Route::get('/aboutUs', fn() => view('aboutUs'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/details/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::post('/pay', [TransactionController::class, 'pay'])->name('pay');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::put('/transactions/{transaction}/done', [TransactionController::class, 'markAsDone'])->name('transactions.markAsDone');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard',  [TransactionController::class, 'adminIndex'])->name('admin.transactions.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::put('/transactions/{transaction}/paid', [TransactionController::class, 'markAsPaid'])->name('transactions.markAsPaid');
    Route::put('/transactions/{transaction}/shipped', [TransactionController::class, 'markAsShipped'])->name('transactions.markAsShipped');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

require __DIR__ . '/auth.php';
