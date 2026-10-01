<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (\Illuminate\Http\Exceptions\ThrottleRequestsException $e, $request) {
            if ($request->routeIs('ai.chat')) {
                return response()->json([
                    'message' => 'Trop de questions. Réessayez dans une minute.',
                ], 429);
            }

            if ($request->routeIs('contact.store')) {
                $message = 'Trop de tentatives. Réessayez dans une minute ou contactez-moi sur WhatsApp.';

                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'ok' => false,
                        'message' => $message,
                    ], 429);
                }

                return redirect()
                    ->route('contact')
                    ->withInput()
                    ->with('error', $message);
            }
        });
    })->create();
