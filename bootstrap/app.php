<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->dontReportDuplicates();
        $exceptions->shouldRenderJsonWhen(function (Request $request) {
            return $request->expectsJson() || $request->is('api/*');
        });

        if (! app()->environment('local')) {
            $exceptions->render(function ( $e) {
                return response()->json([
                    'code'    => $e->status,
                    'message' => $e->getMessage(),
                    'errors'  => $e->errors(),
                ], $e->status);
            });

            $exceptions->render(function (ValidationException $e) {
                if (method_exists($e, 'getStatusCode') && $e->getStatusCode() != 0) {
                    $statusCode = $e->getStatusCode();
                } elseif (method_exists($e, 'getCode') && $e->getCode() != 0) {
                    $statusCode = $e->getCode();
                } else {
                    $statusCode = 404;
                }

                return response()->json(['code' => $statusCode, 'message' => $e->getMessage()], $statusCode);
            });
        }
    })->create();
