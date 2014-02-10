<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    function index()
    {
        $this->view->title = Company;
        $this->view->render('header');
        $this->loadModel('Index');
        $this->view->userList = $this->model->userList();
        $this->view->render('index/index');
        $this->view->render('footer');
    }
    function run()
    {
        echo 'heloo  am index controoler';
        $data = array('name'=> $_POST['name']);
        $this->model->run($data);
        header('location:'.URL.'?msg');
    }
}