<?php

namespace DesafioLeo\Controllers;

use DesafioLeo\Utility;

class NotFoundController
{
    public function errorPage()
    {
        Utility::showPage('generic-error.php');
    }
}
