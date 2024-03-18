<?php

namespace Core;

class Response
{
    public const NOT_FOUND = 404;
    public const BAD_REQUEST = 400;
    public const SERVER_ERROR = 500;
    public const SEE_OTHER = 303;

    public static function abort($code = self::NOT_FOUND)
    {
        http_response_code($code);
        view("codes.{$code}");
        die();
    }

    public static function redirect(string $url)
    {
        http_response_code(self::SEE_OTHER);
        header('location: ' . $url);
        die();
    }
}