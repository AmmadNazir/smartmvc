<?php

class Val 
{
    function __construct() 
    {
        
    }
    public function minlength($data, $arg)
    {
        if(strlen($data) < $arg)
        {
            return "Your String can Only be $arg Long";
        }
    }
    public function maxlength($data, $arg)
    {
        if(strlen($data) > $arg)
        {
            return "Your String can Only be $arg Long";
        }
    }
    public function digit($data)
    {
        if(ctype_digit($data) == FALSE)
        {
            return "Your String must be a digit";
        }
    }
    public function __call($name, $arguments) 
    {
        throw new Exception("$name dose not exist inside of : " . __CLASS__);
    }
}