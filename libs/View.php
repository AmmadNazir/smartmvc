<?php

class View 
{
    function __construct() {
    }
    public function render($name, $noinclude = FALSE)
    { 
        require 'views/'.$name.'.php';
    }
}

