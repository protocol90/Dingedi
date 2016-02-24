<?php

class Security
{

    static function post($field)
    {
        return self::secured($_POST[$field]);
    }

    static function get($field)
    {
        return self::secured($_GET[$field]);
    }

    static function secured($field)
    {
        return nl2br(addslashes(htmlspecialchars(trim($field))));
    }

    static function hash($string)
    {
        return sha1(md5(sha1(md5('dg' . $string))));
    }

}


?>