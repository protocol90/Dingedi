<?php

class Session
{
    static function isLogged()
    {
        if (empty($_SESSION['user'])) {
            return false;
        } else {
            return true;
        }
    }

    static function get($name)
    {
        return $_SESSION['user'][$name];
    }
}