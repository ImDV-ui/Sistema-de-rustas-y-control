<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'CheckAuth' => CheckAuth::class,
            'CheckAdmin' => CheckAdmin::class,
            'CheckAge' => CheckAge::class,
            'check.auth' => CheckAuth::class,
            'check.admin' => CheckAdmin::class,
            'check.age' => CheckAge::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
