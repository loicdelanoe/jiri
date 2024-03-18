<?php

use App\Http\Controllers\JiriController;

/** @var Core\Router $router */
$router->get('/', [JiriController::class, 'index']); // Done

$router->get('/jiris', [JiriController::class, 'index']); // Done

$router->get('/jiri', [JiriController::class, 'show']); // Done

$router->get('/jiri/create', [JiriController::class, 'create']); // Done
$router->post('/jiri', [JiriController::class, 'store']); // Done

$router->get('/jiri/edit', [JiriController::class, 'edit']); // Done
$router->post('/jiri/update', [JiriController::class, 'update']); // Done

$router->post('/jiri/delete', [JiriController::class, 'destroy']); // Done
