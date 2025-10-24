<?php

use App\Http\Middleware\VerifyIsAdmin;
use App\Http\Middleware\VerifyIsSuperAdmin;
use App\Http\Middleware\VerifyIsUser;
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
        $middleware->alias([
            'isSuperAdmin' => VerifyIsSuperAdmin::class,
            'isAdmin' => VerifyIsAdmin::class,
            'isUser' => VerifyIsUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
