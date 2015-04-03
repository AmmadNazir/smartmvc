<?php

class Error extends Controller{
    function __construct() {
        parent::__construct();
     //   echo 404;
    }
    function index()
    {
        echo 'Some Thing is Wrong';
    }
}
