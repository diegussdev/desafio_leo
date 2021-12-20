<?php

namespace DesafioLeo\Router;

class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);
        $route = (parse_url($route));
        $route = array_key_exists('path', $route) ? $route['path'] : '';

        $arguments = [];

        if ($_POST) {
            $arguments = $_POST;
            $arguments['FILES'] = $_FILES;
        } elseif ($_GET) {
            $arguments = $_GET;
        }

        if ($route === '') {
            $this->home();
        } else {
            $this->$route($arguments);
        }
    }
}
