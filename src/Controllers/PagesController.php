<?php

class PagesController extends Controller
{
    public function indexAction()
    {
        return $this->render('pages@index');
    }

}