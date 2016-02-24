<?php

class AdminController extends Controller
{
    public function __construct()
    {
        if (Session::get('admin') != 1) {
            Flash::setFlash(Alert::error('Ahah petit malin, tu veut entrer dans le cour des grands ?'));
            Tools::redirect(Html::link('/'));
            exit();
        }

    }

    public function indexAction()
    {
        return $this->render('admin@index');
    }

    public function usersAction()
    {
        $users = Database::select('users', 'all');

        return $this->render('admin@users', array(
            'users' => $users
        ));
    }
}