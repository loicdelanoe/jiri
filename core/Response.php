<?php

namespace Core;

class Response
{
    const NOT_FOUND = 404;
    const BAD_REQUEST = 400;

    public static function abort($code = self::NOT_FOUND)
    {
        http_response_code($code);
        view("codes.{$code}");
        die();
    }
}