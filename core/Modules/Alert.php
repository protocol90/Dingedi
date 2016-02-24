<?php

class Alert
{
    static function error($error)
    {
        return '<div class="alert red"> <i class="fa fa-close"></i> ' . $error . '</div>';
    }

    static function success($valid)
    {
        return '<div class="alert green"> <i class="fa fa-check-circle"></i> ' . $valid . '</div>';
    }
}