<?php

const BASE_PATH = __DIR__ . '/..';
require BASE_PATH . '/core/helpers/functions.php';
require base_path('vendor/autoload.php');
$router = new \Core\Router();
require base_path('routes/web.php');

$router->routeToController(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
    $_SERVER['REQUEST_METHOD']
);

