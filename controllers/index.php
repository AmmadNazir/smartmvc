<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        
    }
    function index()
    {
        $this->view->title = 'INDEX';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }
}