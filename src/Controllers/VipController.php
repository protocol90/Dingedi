<?php

class VipController extends Controller
{

    public function indexAction()
    {
        if (Session::get('vip') == 0) {
            Tools::redirect(Html::link('vip/buy'));
            exit();
        }
        return $this->render('vip@index');
    }

}