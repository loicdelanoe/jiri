<?php

namespace Core\middlewares;

use Core\Exceptions\MiddlewareNotFoundException;

class Middleware
{

    private const MAP = [
        'csrf' => CSRF::class,
        'auth' => Authenticated::class,
    ];

    public static function resolve(string $middleware): void
    {

        if (!array_key_exists($middleware, self::MAP)) {
            throw new MiddlewareNotFoundException("Middleware $middleware is not defined");
        }

        $middleware = self::MAP[$middleware];

        (new $middleware)->handle();
    }
}