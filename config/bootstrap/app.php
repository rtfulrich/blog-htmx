<?php

use Config\bootstrap\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};

return Application::configure(basePath: dirname(path: __DIR__, levels: 2))
    ->withRouting(
        web: __DIR__ . '/../../routes/web.php',
        commands: __DIR__ . '/../../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {})
    ->withExceptions(function (Exceptions $exceptions) {})
    ->create();
