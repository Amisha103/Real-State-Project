<?php

use App\Http\Middleware\CheckCustomerType;
use App\Http\Middleware\loginMiddleware;
use App\Http\Middleware\LogoutMiddleware;
use App\Http\Middleware\PurchaseDetailsMiddlleware;
use App\Http\Middleware\YourBlogMiddleware;
use Illuminate\Foundation\Application;
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
            'post_check' => CheckCustomerType::class,
        ]);

        $middleware->alias([
            'login_check' => loginMiddleware::class,
        ]);

        $middleware->alias([
            'purchase_details_check' => PurchaseDetailsMiddlleware::class,
        ]);

        $middleware->alias([
            'your_blog_check' => YourBlogMiddleware::class,
        ]);

        $middleware->alias([
            'logout_check' => LogoutMiddleware::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
