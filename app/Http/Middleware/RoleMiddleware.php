<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        if ($user && $user->role === $role) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have access to this page.');
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     // Ensure the user is authenticated
    //     if (Auth::check()) {
    //         // Attach the user's role to the request object
    //         $request->attributes->add(['user_role' => Auth::user()->role]);
    //     }

    //     return $next($request);
    // }

}
