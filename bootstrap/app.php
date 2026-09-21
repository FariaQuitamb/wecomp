<?php

use App\Http\Middleware\PreventCmsIndexing;
use App\Http\Middleware\UseHostScopedSession;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->prepend(UseHostScopedSession::class);
        $middleware->append(PreventCmsIndexing::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
