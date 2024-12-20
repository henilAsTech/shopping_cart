<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware('web')->group(function () {
            Route::middleware([])->group(base_path('routes/web/web.php'));
            Route::middleware([])->group(base_path('routes/web/auth.php'));

            Route::prefix('super-admin')
                ->name('superadmin.')
                ->middleware(['auth:super_admin'])
                ->group(base_path('routes/web/super_admin.php'));

            Route::prefix('admin')
                ->name('admin.')
                ->middleware(['auth:admin'])
                ->group(base_path('routes/web/admin.php'));

            Route::prefix('user')
                ->name('user.')
                ->middleware(['auth:user'])
                ->group(base_path('routes/web/user.php'));
        });
    }
}
