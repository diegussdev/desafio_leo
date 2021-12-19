<?php

abstract class RouteSwitch
{
    public function __call($name, $arguments)
    {
        http_response_code(404);
        require 'views/pages/not-found.html';
    }
}
