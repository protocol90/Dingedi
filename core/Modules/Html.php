<?php

class Html
{

    static function css($css)
    {
        $url = BASE_WEB . "/web/css/$css.css";
        echo "<link rel='stylesheet' href='$url'>";
    }

    static function js($js)
    {
        $url = BASE_WEB . "web/js/$js.js";
        echo "<script src='$url'></script>";
    }

    static function link($path)
    {
        if ($path[0] == '/') {
            $path = substr($path, 1);
        }
        $url = BASE_WEB . "$path";

        return $url;
    }

    static function img($img)
    {
        $url = BASE_WEB . "/web/img/$img";
        echo "<img src='$url'>";
    }

    static function partials($file)
    {
        require SRC . '/Views/partials/' . $file . '.php';
    }
}