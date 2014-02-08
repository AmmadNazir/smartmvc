<?php

class Error extends Controller{
    function __construct() {
        parent::__construct();
     //   echo 404;
    }
    function index()
    {
        $this->view->title = '404';
        $this->view->render('error/index');
    }
}
