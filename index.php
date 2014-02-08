<?php

require 'config.php';

// auto load
// also spl_autoload_register (take a liik at if you like)
function __autoload($class)
{
    if(file_exists(LIBS . $class . '.php')) 
    {
        require LIBS .$class.'.php';
    }
    else 
    {
       throw new Exception("Somthing is Wrong");
    }
}
$bootstrap = new Bootstrap();
$bootstrap->init();