<?php

namespace DesafioLeo\Controllers;

use DesafioLeo\Utility;

class CourseController
{
    public function create()
    {
        Utility::showPage('create.php');
    }

    public function edit()
    {
        Utility::showPage('edit.php');
    }
}
