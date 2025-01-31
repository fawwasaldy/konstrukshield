<?php

use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cart', [CartController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('cart');
Route::post('/cart/update', [CartController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('cart.update');
Route::delete('/cart/clear', [CartController::class, 'clear'])
    ->middleware(['auth', 'verified'])
    ->name('cart.clear');
Route::post('/cart/increase', [CartController::class, 'increase'])
    ->middleware(['auth', 'verified'])
    ->name('cart.increase');
Route::post('/cart/decrease', [CartController::class, 'decrease'])
    ->middleware(['auth', 'verified'])
    ->name('cart.decrease');
Route::post('/cart/remove', [CartController::class, 'remove'])
    ->middleware(['auth', 'verified'])
    ->name('cart.remove');

Route::get('/analyze', [AnalyzeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('analyze');
Route::post('/analyze/result', [AnalyzeController::class, 'result'])
    ->middleware(['auth', 'verified'])
    ->name('analyze.result');

require __DIR__.'/auth.php';
