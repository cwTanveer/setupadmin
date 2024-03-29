<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->user_type == 'admin') {
                return $next($request);
            } elseif ($user->user_type == 'user') {
                return redirect()->route('welcome');
            }
        }
        return redirect()->route('login');
    }
}
