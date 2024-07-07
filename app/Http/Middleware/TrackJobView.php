<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\JobView;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackJobView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $jobId = $request->route('job');
        if ($jobId) {
            JobView::create([
                'job_id' => $jobId,
                'user_id' => auth()->id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
        }
        return $next($request);
    }
}
