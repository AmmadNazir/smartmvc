<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        
     //   Auth::handleLogin();
    }
    function index()
    {
        $this->load->view('index');
    }
}