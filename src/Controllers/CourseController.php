<?php

namespace DesafioLeo\Controllers;

use DesafioLeo\Models\Course;
use DesafioLeo\Utility;

class CourseController
{
    public function create()
    {
        Utility::showPage('create.php');
    }

    public static function listAll()
    {
        $courses = (new Course)->selectAll();

        if (!$courses) {
            return;
        }

        foreach ($courses as $course) {

            Utility::showComponent('card.php', ['course' => $course->toArray()]);
        }
    }

    public function edit()
    {
        Utility::showPage('edit.php');
    }
}
