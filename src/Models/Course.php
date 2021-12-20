<?php

namespace DesafioLeo\Models;

use DesafioLeo\Connection;

class Course
{
    private $id;
    private $title;
    private $description;
    private $link;
    private $image;

    public function selectAll(
        string $where = null,
        string $order = null,
        string $limit = null,
        string $fields = "*"
    ) {
        $select = (new Connection('courses'))->select($where, $order, $limit, $fields);
        $result = [];

        while ($course = $select->fetchObject(self::class)) {
            $result[$course->id] = $course;
        }

        return $result;
    }

    public static function getById(int $id)
    {
        $select = (new Connection('courses'))->select("id = '{$id}'");
        return $select->fetchObject(self::class);
    }

    public function create()
    {
        $this->id = (new Connection('courses'))->insert($this->getData());
        return true;
    }

    public function update()
    {
        return (new Connection('courses'))->update("id = '{$this->id}'", $this->getData());
    }

    public function delete()
    {
        return (new Connection('courses'))->delete("id = '{$this->id}'");
    }

    private function getData()
    {
        return [
            'course' => $this->course,
            'title' => $this->title,
            'link' => $this->link,
            'description' => $this->description,
            'image' => $this->image,
        ];
    }
}
