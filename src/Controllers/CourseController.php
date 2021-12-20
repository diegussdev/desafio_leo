<?php

namespace DesafioLeo\Controllers;

use DesafioLeo\Models\Course;
use DesafioLeo\Uploader;
use DesafioLeo\Utility;

class CourseController
{
    public function create()
    {
        Utility::showPage('create.php', ['action' => '/course/store']);
    }

    public function store($data)
    {
        $file = $data['FILES']['image'];
        $fileName = 'defaultImage.png';

        if ($file['name']) {
            $uploader = new Uploader($file);
            $upload = $uploader->upload();

            if ($upload) {
                $fileName = $uploader->getFileName();
            }
        }

        $data['image'] = $fileName;

        $course = new Course();

        $course->build($data);

        if ($course) {
            $course->create();
        }

        header('Location: /');
    }

    public static function listAll()
    {
        $courses = (new Course)->selectAll();

        if (!$courses) {
            return;
        }

        foreach ($courses as $course) {
            $course->image = Utility::mountImageUrl($course->image);
            Utility::showComponent('card.php', ['course' => $course->toArray()]);
        }
    }

    public function edit($data)
    {
        if (!$id = $data['id']) {
            header('Location: /');
        }

        $course = Course::getById($id);

        if (!$course) {
            header('Location: /');
        }

        $course->image = Utility::mountImageUrl($course->image);

        Utility::showPage('edit.php', [
            'action' => [
                'update' => "/course/update",
                'delete' => "/course/delete",
            ],
            'course' => $course->toArray()]);
    }

    public function update($data)
    {
        $file = $data['FILES']['image'];
        $fileName = 'defaultImage.png';

        if (!$id = $data['id']) {
            header('Location: /');
        }

        $course = Course::getById($id);

        if (!$course) {
            header('Location: /');
        }

        if ($file['name']) {
            $uploader = new Uploader($file);
            $upload = $uploader->upload();

            if ($upload) {
                $fileName = $uploader->getFileName();
            }
        } else {
            $fileName = $course->image;
        }

        $data['image'] = $fileName;

        $course = new Course();

        $course->build($data);

        if ($course) {
            $course->update();
        }

        header('Location: /');
    }

    public function delete($data)
    {
        if (!$id = $data['id']) {
            header('Location: /');
        }

        $course = Course::getById($id);

        if (!$course) {
            header('Location: /');
        }

        $course->delete();
        header('Location: /');
    }
}
