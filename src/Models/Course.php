<?php

namespace DesafioLeo\Models;

use DesafioLeo\Connection;

class Course
{
    public $id;
    public $title;
    public $description;
    public $link;
    public $image;

    public function build($data)
    {
        if (!$data['title']
            || !$data['description']
            || !$data['link']
            || !$data['image']
        ) {
            return null;
        }

        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->link = $data['link'];
        $this->image = $data['image'];

        return self;
    }

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

    public function toArray()
    {
        return get_object_vars($this);
    }

    private function getData()
    {
        return [
            'title' => $this->title,
            'link' => $this->link,
            'description' => $this->description,
            'image' => $this->image,
        ];
    }
}
