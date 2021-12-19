<?php

namespace DesafioLeo\Controllers;

use DesafioLeo\Utility;

class NotFoundController
{
    public function notFoundPage()
    {
        Utility::showPage('not-found.php');
    }
}
