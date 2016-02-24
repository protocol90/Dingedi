<?php

$router->get('/', function () {
    Controller::init('PagesController@index');
});

$router->get('/register', function () {
    Controller::init('UsersController@register');
});

$router->get('/api/login', function () {
    Controller::init('UsersController@login');
});

$router->get('/logout', function () {
    Controller::init('UsersController@logout');
});

$router->get('/accounts/parameters', function () {
    Controller::init('UsersController@parameters');
});

$router->get('/vip', function () {
    Controller::init('VipController@index');
});

$router->get('/tournament/create', function () {
    Controller::init('TournamentsController@create');
});

$router->get('/tournaments/:console/:game', function ($console, $game) {
Controller::init("TournamentsController@tournaments", [$console, $game]);
});

$router->get('/tournaments/:id', function ($id) {

});