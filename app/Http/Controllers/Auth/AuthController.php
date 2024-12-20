<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {
        $this->authService->setRole(0);
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function loginStore(LoginRequest $request): RedirectResponse
    {   
        $credentials = $request->only('email', 'password');
        $data = $this->authService->getRoleData($request->role);
        if (Auth::guard($data['guard'])->attempt($credentials)) {
            $request->session()->regenerate();
            session(['auth_guard' => $data['guard']]);
            if ((session('previous_url'))) {
                $redirect = $data['guard'].'/'.session('previous_url');
                session()->forget('previous_url');
                return redirect($redirect);    
            }
            return redirect()->route($data['dashboard']);
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request): RedirectResponse
    {   
        $route = $this->authService->register($request->validated());
        return redirect()->route($route);
    }
}
