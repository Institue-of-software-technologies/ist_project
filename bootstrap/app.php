<?php

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Foundation\Application;
use Illuminate\Cache\RateLimiting\Limit;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'check.alumni.profile' => \App\Http\Middleware\CheckAlumniProfile::class,
            'track.job.view' => \App\Http\Middleware\TrackJobView::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Throttling for specific exceptions
        $exceptions->throttle(function (Throwable $e) {
            if ($e instanceof BroadcastException) {
                return Limit::perMinute(300)->by($e->getMessage());
            }
        });

        // General response handling for other status codes
        $exceptions->respond(function (Response $response) {
            switch ($response->getStatusCode()) {
                case 503:
                    return response()->view('errors.503');
                case 500:
                    return response()->view('errors.500');
                case 404:
                    return response()->view('errors.404');
                case 403:
                    return response()->view('errors.403');
                case 400:
                    return response()->view('errors.400');
                case 429: // Handle Too Many Requests
                    return response()->view('errors.429', [], 429);
                default:
                    return $response;
            }
        });
    })->create();
