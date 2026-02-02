<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user') && $request->hasCookie('remember_me_token')) {
            $token = $request->cookie('remember_me_token');
            $user = User::where('remember_token', $token)->first();

            if ($user) {
                Session::put('user', $user);
            }
        }

        if (!session()->has('user')) {
            return redirect()->route('login-form');
        }

        return $next($request);
    }
}
