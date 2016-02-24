<?php

class Form
{
    static function input($options)
    {
        $input = '';

        if (!empty($options['label'])) {
            $input .= "<label for='" . $options['name'] . "'>" . $options['label'];

        }

        if (!empty($options['span'])) {
            $input .= "<span> " . $options['span'] . "</span>";
        }
        if (!empty($options['span'])) {
            $input .= "</label>";
        }

        $input .= "<input id='" . $options['name'] . "'";

        foreach ($options as $k => $v) {
            if (!in_array($k, ['span', 'label'])) {
                $input .= $k . '="' . $v . '"';
            }
        }

        return $input . '>';
    }
}