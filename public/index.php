<?php

use Core\Router;

const BASE_PATH = __DIR__ . '/..';
require BASE_PATH . '/core/helpers/functions.php';
require base_path('vendor/autoload.php');

session_start();

$router = new Router();
require base_path('routes/web.php');

$request_method = isset($_REQUEST['_method']) && in_array(strtoupper($_REQUEST['_method']), ['PUT', 'PATCH', 'DELETE'])
    ? $_REQUEST['_method']
    : $_SERVER['REQUEST_METHOD'];
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->routeToController($request_uri, $request_method);

