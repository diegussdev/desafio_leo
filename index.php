<?php

require_once __DIR__ . '/src/Router/Router.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);
