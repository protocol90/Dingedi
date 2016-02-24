<?php

function render($views)
{
    $views = explode('@', $views);

    if (file_exists(SRC . '/Models/' . $views[0] . '.php')) {
        require SRC . '/Models/' . $views[0] . '.php';
    }

    if (file_exists(SRC . '/Views/' . $views[1] . '.php')) {
        require SRC . '/Views/' . $views[1] . '.php';
    }

}

function ajax($model)
{
    if (file_exists(SRC . '/Models/' . $model . '.php')) {
        require SRC . '/Models/' . $model . '.php';
    }
}

function view($view)
{
  if (file_exists(SRC . '/Views/' . $view . '.php')) {
      require SRC . '/Views/' . $view . '.php';
  }
}