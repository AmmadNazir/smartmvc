<?php

class Error extends Controller{
    function __construct() {
        parent::__construct();
     //   echo 404;
    }
    function index()
    {
        $this->load->title = '404';
        $this->load->view('error/index');
    }
}
