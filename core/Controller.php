<?php

class Controller
{

    var $vars = array();
    var $layout = 'default';

    static function init($action, $params = array())
    {
        $action = explode('@', $action);

        require SRC . '/Controllers/' . $action[0] . '.php';

        $controller = new $action[0]();
        $action = $action[1] . 'Action';

        if (!empty($params)) {
            call_user_func_array(array($controller, $action), $params);
        } else {
            $controller->$action();
        }
    }

    public function set($set)
    {
        $this->vars = array_merge($this->vars, $set);
    }

    public function render($view, $data = array())
    {
        extract($data);

        ob_start();
        $view = explode('@', $view);
        require SRC . '/Views/' . ucfirst($view[0]) . '/' . $view[1] . '.php';
        $content_for_layout = ob_get_clean();
        if ($this->layout == false) {
            echo $content_for_layout;
        } else {
            require SRC . '/Views/layouts/' . $this->layout . '.php';
        }

    }

}