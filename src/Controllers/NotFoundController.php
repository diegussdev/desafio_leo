<?php

namespace DesafioLeo\Controllers;

class NotFoundController
{
    public function notFoundPage()
    {
        echo file_get_contents("views/pages/not-found.html");
    }
}
