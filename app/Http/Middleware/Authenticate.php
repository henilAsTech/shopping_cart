<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if (empty($guards)) {
            $guards = [null];
        }

        $user = null;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                break;
            }
        }

        if (!$user || !in_array(session('auth_guard'), $guards)) {
            if ($request->email) {
                return redirect()->route('login')->with('error', 'Unauthorized access.');
            }
            return redirect()->route('login');
        }

        return $next($request);
    }
}
