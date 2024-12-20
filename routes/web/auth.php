<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\SuperAdmin\AuthController as SuperAdminAuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginStore');
    Route::get('register', 'register')->name('register');
    Route::get('admin/register', 'register');
    Route::get('super-admin/register', 'register');
    Route::post('register', 'registerStore');
});

Route::prefix('user')->name('user.')->controller(UserAuthController::class)->group(function () {
    Route::middleware('auth:user')->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->controller(AdminAuthController::class)->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

Route::prefix('super-admin')->name('superadmin.')->controller(SuperAdminAuthController::class)->group(function () {
    Route::middleware('auth:super_admin')->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});