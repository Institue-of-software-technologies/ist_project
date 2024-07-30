<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();

            if ($request->is(['super-user', 'super-user/*'])) {
                switch ($statusCode) {
                    case 400:
                        return response()->view('super-user.errors.400', [], 400);
                    case 403:
                        return response()->view('super-user.errors.403', [], 403);
                    case 404:
                        return response()->view('super-user.errors.404', [], 404);
                    case 500:
                        return response()->view('super-user.errors.500', [], 500);
                    case 503:
                        return response()->view('super-user.errors.503', [], 503);
                }
            }

            switch ($statusCode) {
                case 400:
                    return response()->view('alumni.errors.400', [], 400);
                case 403:
                    return response()->view('alumni.errors.403', [], 403);
                case 404:
                    return response()->view('alumni.errors.404', [], 404);
                case 500:
                    return response()->view('alumni.errors.500', [], 500);
                case 503:
                    return response()->view('alumni.errors.503', [], 503);
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (HttpException $exception, Request $request) {
            $statusCode = $exception->getStatusCode();

            if ($request->is(['super-user', 'super-user/*'])) {
                switch ($statusCode) {
                    case 400:
                        return response()->view('super-user.errors.400', [], 400);
                    case 403:
                        return response()->view('super-user.errors.403', [], 403);
                    case 404:
                        return response()->view('super-user.errors.404', [], 404);
                    case 500:
                        return response()->view('super-user.errors.500', [], 500);
                    case 503:
                        return response()->view('super-user.errors.503', [], 503);
                }
            }

            switch ($statusCode) {
                case 400:
                    return response()->view('alumni.errors.400', [], 400);
                case 403:
                    return response()->view('alumni.errors.403', [], 403);
                case 404:
                    return response()->view('alumni.errors.404', [], 404);
                case 500:
                    return response()->view('alumni.errors.500', [], 500);
                case 503:
                    return response()->view('alumni.errors.503', [], 503);
            }
        });
    }
}
