<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
      protected $routeMiddleware = [
        'jwt.auth' => \App\Http\Middleware\JwtMiddleware::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
      ];

      protected $middlewareGroups = [
        'api' => [
            \Illuminate\Http\Middleware\HandleCors::class,
        ],
    ];
}
