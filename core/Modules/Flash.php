<?php

class Flash
{
    static function setFlash($message)
    {
        $_SESSION['flash'][] = $message;
    }

    static function get()
    {
        if (empty($_SESSION['flash'])) {
            return;
        }
        foreach ($_SESSION['flash'] as $flash => $v) {
            echo $v;
            unset($_SESSION['flash'][$flash]);
        }
    }
}