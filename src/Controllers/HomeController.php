<?php

namespace DesafioLeo\Controllers;

use DesafioLeo\Utility;

class HomeController
{
    public function index()
    {
        Utility::showPage('home.php');
    }
}
