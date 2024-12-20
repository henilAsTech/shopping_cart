<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\ProductController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', [ProductController::class, 'index'])->name('product');
Route::post('/add-to-card', [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/my-cart', [ProductController::class, 'viewCart'])->name('viewCart');
Route::delete('/remove-item', [ProductController::class, 'removeItem'])->name('removeItem');
Route::post('/order-place', [OrderController::class, 'create'])->name('placeOrder');
