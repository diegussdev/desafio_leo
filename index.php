<?php

require __DIR__ . '/vendor/autoload.php';

use DesafioLeo\Router\Router;

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);
