<?php

namespace DesafioLeo\Router;

use DesafioLeo\Controllers\CourseController;
use DesafioLeo\Controllers\HomeController;
use DesafioLeo\Controllers\NotFoundController;

abstract class RouteSwitch
{
    const ROUTES = [
        'GET' => [
            'home' => [HomeController::class, 'index'],
            'course/create' => [CourseController::class, 'create'],
            'course/edit' => [CourseController::class, 'edit'],
        ],
        'POST' => [
        ],
    ];

    public function __call($name, $arguments)
    {
        if ($_POST && array_key_exists($name, self::ROUTES['POST'])) {
            $class = self::ROUTES['POST'][$name][0];
            $method = self::ROUTES['POST'][$name][1];
        } elseif (array_key_exists($name, self::ROUTES['GET'])) {
            $class = self::ROUTES['GET'][$name][0];
            $method = self::ROUTES['GET'][$name][1];
        } else {
            $class = NotFoundController::class;
            $method = 'notFoundPage';
        }

        $this->executeRoute($class, $method, $arguments);
    }

    function executeRoute($class, $method, $arguments)
    {
        if (method_exists($class, $method)) {
            $class = new $class;
            $class->$method($arguments);
            return;
        }
    }
}
