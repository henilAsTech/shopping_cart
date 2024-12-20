<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {
        $this->authService->setRole(0);
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
