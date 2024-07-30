<?php

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
    // ->withExceptions(function (Exceptions $exceptions) {
    //     //
    // })->create();
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $exception, Request $request) {
            if ($request->is(['super-user', 'super-user/*'])) {
                if ($exception->getStatusCode() == 400) {
                    return response()->view("super-user.errors.400", [], 400);
                }

                if ($exception->getStatusCode() == 403) {
                    return response()->view("super-user.errors.403", [], 403);
                }

                if ($exception->getStatusCode() == 404) {
                    return response()->view("super-user.errors.404", [], 404);
                }

                if ($exception->getStatusCode() == 500) {
                    return response()->view("super-user.errors.500", [], 500);
                }

                if ($exception->getStatusCode() == 503) {
                    return response()->view("super-user.errors.503", [], 503);
                }
            }

            if ($exception->getStatusCode() == 400) {
                return response()->view("alumni.errors.400", [], 400);
            }
            if ($exception->getStatusCode() == 403) {
                return response()->view("alumni.errors.403", [], 403);
            }

            if ($exception->getStatusCode() == 404) {
                return response()->view("alumni.errors.404", [], 404);
            }
            if ($exception->getStatusCode() == 500) {
                return response()->view("alumni.errors.500", [], 500);
            }
            if ($exception->getStatusCode() == 503) {
                return response()->view("alumni.errors.503", [], 503);
            }

        });
    })->create();