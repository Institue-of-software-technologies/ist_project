<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAlumniProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->hasRole('alumni')) {
            $profile = AlumniProfile::where('user_id', $user->id)->first();

            if (!$profile) {
                return redirect()->route('alumni.profile.create')->with('status', 'Please create your profile first.');
            }
        }

        return $next($request);
    }
}
