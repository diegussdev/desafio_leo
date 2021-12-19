<?php

namespace DesafioLeo\Controllers;

class HomeController
{
    public function index()
    {
        echo file_get_contents("views/pages/home.html");
    }
}
