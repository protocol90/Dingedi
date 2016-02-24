<?php

$modules = [ 'Alert', 'Database', 'Security', 'Session', 'Form', 'Tools', 'Html', 'Flash' ];

foreach ($modules as $module) {
    require CORE . '/Modules/' . $module . '.php';
}