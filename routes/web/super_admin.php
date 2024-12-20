<?php

use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\CategoryController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\OrderController;
use App\Http\Controllers\SuperAdmin\ProductController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('admins', AdminController::class)->except('show');
Route::resource('users', UserController::class)->except('show');
Route::resource('orders', OrderController::class)->except('show');
Route::resource('categories', CategoryController::class)->except('show');
Route::get('category/{category}/status', [CategoryController::class, 'updateStatus'])->name('category.status');

Route::resource('products', ProductController::class)->except('show', 'destroy');
Route::delete('products/soft-delete/{product}', [ProductController::class, 'softDelete'])->name('product.soft-delete');
Route::delete('products/hard-delete/{product}', [ProductController::class, 'hardDelete'])->name('product.hard-delete');
Route::get('product/{product}/status', [ProductController::class, 'updateStatus'])->name('product.status');