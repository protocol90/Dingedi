<?php
ob_start();
session_start();

define('ROOT', __DIR__);
define('CORE', ROOT . '/core');
define('SRC', ROOT . '/src');
define('WEB', ROOT . '/web');
define('BASE_WEB', "http://" . $_SERVER['SERVER_NAME'] . "/Dingedi/");

require ROOT . '/config/Config.php';

if (DEBUG) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
}

require CORE . '/Modules.php';

if (Session::isLogged()) {
    $_SESSION['user'] = Database::select('users', ['id' => Session::get('id')])->fetch(PDO::FETCH_ASSOC);
}

require CORE . '/Controller.php';
require CORE . '/Router/Route.php';
require CORE . '/Router/Router.php';

$router = new Router($_GET['url']);

require ROOT . '/config/Routing.php';

$router->run();

ob_end_flush();

?>