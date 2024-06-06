<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Check if the user has 'super-admin' or 'admin' role
            if ($user->hasRole(['super-admin', 'admin'])) {
                return $next($request);
            }

            // Check if the user has 'alumni' role and redirect accordingly
            if ($user->hasRole('alumni')) {
                return redirect()->route('alumni_dashboard');
            }

            // If the user does not have the required role, deny access
            abort(403, "User does not have permission");
        }

        // If the user is not authenticated, deny access
        abort(401);
    }
}
