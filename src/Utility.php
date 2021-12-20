<?php

namespace DesafioLeo;

class Utility
{
    public static function showPage($page, $data = [])
    {
        $path = "views/pages/{$page}";
        self::showTemplate($path, $data);
    }

    public static function showComponent($component, $data = [])
    {
        $path = "views/components/{$component}";
        $file = file_get_contents($path);

        $file = self::bind($file, $data);

        eval("?>{$file}");
    }

    private static function showTemplate($path, $arguments = [])
    {
        global $content;
        global $data;
        $data = $arguments;

        $file = file_get_contents($path);
        $content = "?>{$file}";

        $path = "views/pages/layout.php";
        $file = file_get_contents($path);
        eval("?>{$file}");
    }

    public static function mountImageUrl($image)
    {
        return "/public/uploads/{$image}";
    }

    private static function bind($template, $data)
    {
        if (preg_match_all("/{{(.*?)}}/", $template, $m)) {
            foreach ($m[1] as $i => $bind) {
                $bind = explode(".", $bind);

                $dataBind = array_key_exists($bind[0], $data) ? $data[$bind[0]] : '';

                if ($dataBind && count($bind) > 1) {
                    $dataBind = array_key_exists($bind[1], $dataBind) ? $dataBind[$bind[1]] : '';
                }

                $template = str_replace($m[0][$i], sprintf('%s', $dataBind), $template);
            }
        }

        return $template;
    }
}
