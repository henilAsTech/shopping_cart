<?php

namespace App\Http;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\VerifyEmail;
use Illuminate\Foundation\Configuration\Middleware;

class AppMiddleware
{
    public function __invoke(Middleware $middleware)
    {
        $middleware->alias([
            'auth' => Authenticate::class,
            // 'verify.api' => VerifyEmail::class,
        ]);
    }
}
