<?php

class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function view($name, $noInclude = false)
    {
        require 'views/' . $name . '.php';    
    }

}