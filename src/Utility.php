<?php

namespace DesafioLeo;

class Utility
{
    public static function showPage($page)
    {
        $path = "views/pages/{$page}";
        self::showTemplate($path);
    }

    public static function showComponent($component)
    {
        $path = "views/components/{$component}";
        $file = file_get_contents($path);
        $content = eval("?>{$file}");
        echo $content;
    }

    private static function showTemplate($path)
    {
        global $content;
        $file = file_get_contents($path);
        $content = "?>{$file}";

        $path = "views/pages/layout.php";
        $file = file_get_contents($path);
        $template = eval("?>{$file}");
        echo $template;
    }
}
