<?php

use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/order-place', [OrderController::class, 'store'])->name('placeOrder');

Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/my-cart', [CartController::class, 'index'])->name('userCart');
Route::post('/my-cart/create', [CartController::class, 'store'])->name('userCartUpdate');
Route::delete('/my-cart/delete', [CartController::class, 'destroy'])->name('userCartDelete');
