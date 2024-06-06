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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth :: check())
        {
            // return redirect('/login');
        }
        {
        /** @var App\Models\User */
        $user = Auth::user();
        if ($user->hasRole(['super-admin', 'admin',])) {
            // Redirect to a specific route if the user is not an admin
            return $next($request);
        }
        abort(403 ,"User does not have permission");
    }
        abort(401);
    }
}