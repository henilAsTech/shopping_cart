<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {
        $this->authService->setRole(1);
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
