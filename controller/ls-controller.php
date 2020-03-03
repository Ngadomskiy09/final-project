<?php
class LsController
{
    private $_f3;
    private $_val;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home(){
        $template = new Template();
        echo $template->render('views/home.html');
    }

    public function login(){
        $template = new Template();
        echo $template->render('views/login.html');
    }

    public function create(){
        $template = new Template();
        echo $template->render('views/create.html');
    }


}