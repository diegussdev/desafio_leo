<?php

namespace DesafioLeo;

class Uploader
{

    private $file;
    private $maxSize;
    private $fileName;
    private $types = ['image/jpeg', 'image/png'];
    private $path = 'public/uploads/';

    public function __construct(array $file)
    {
        $this->file = $file;
        $this->maxSize = 2000000;
    }

    public function upload()
    {
        $validate = $this->validate();

        if (!$validate) {
            return false;
        }

        $extension = explode('.', $this->file['name']);
        $name = uniqid('img_', true) . '.' . end($extension);

        if (!is_dir($this->path)) {
            mkdir($this->path, 0755);
        }

        if (!move_uploaded_file($this->file['tmp_name'], $this->path . $name)) {
            return false;
        }

        $this->fileName = $name;

        return true;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    private function validate()
    {
        $fileType = mime_content_type($this->file['tmp_name']);

        if (!in_array($fileType, $this->types)) {
            return false;
        }

        if ($this->file['size'] > $this->maxSize) {
            return false;
        }

        return true;
    }
}
