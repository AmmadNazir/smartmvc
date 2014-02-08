<?php
/*
 * - Fill out a form
 * - POST to PHP
 * - Sanatize
 * - Validate
 * - Return Data 
 * - Write to Database
 */
require 'Form/Val.php';
class Form
{
    /** @var array $_postData sthe immideatly postes item */
    private $_currentItem = null;

    /** @var array $_postData stares the Posted Data */
    private $_postData = array();
    
    /** @var object $_Val the validator */
    private $_val = array();
    
    /** @var array  $_error the error holder */
    private $_error = array();
    
    /*
     * __constructs - Insterated the validtor class
     */
    public function __construct() 
    {
        $this->_val = new Val();
    }
    /*
     * post this is to run $_POST
     * 
     * @param string $field - The HTML fieldname to post
     */
    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
//        echo ' ----- '.$this->_currentItem .' ------- ';
        return $this;
    }
    /*
     * fetch return the posted data
     * @param mixed $fileName
     * @param mixed string or array
     */
    public function fetch($fieldNeme = FALSE)
    {
        if($fieldNeme)
        {
            if (isset($this->_postData[$fieldNeme])) 
            {
                return $this->_postData[$fieldNeme];
            } 
            else 
            {
                return FALSE;
            }
        }
        else
        {
            return $this->_postData;
        }
    }
    /*
     * val is the validation of form
     * @param string $typeOfValidator a method from the Form/Val class
     * @param string $arg A property against
     */
    public function val($typeOfValidator, $arg = NULL)
    {
        if ($arg == NULL) 
        {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        } 
        else 
        {
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
        }
//
//        echo '111';
//        echo $error;  
//        echo '111';
        if ($error) 
        {
            $this->_error[$this->_currentItem] = $error;
        }
     //   echo '<pre>';
   //     print_r($this->_error);
        return $this;
    }
    /*
     * submit - Handles the form and throws an exception upon error
     * @return boolean
     * $throws Exception
     */
    public function submit()
    {
        if(empty($this->_error))
        {
            return TRUE;
        }
        else
        {
            $str = "";
            foreach ($this->_error as $key => $value)
            {
                $str .= $key . ' => ' . $value . "\n";
            }
            throw new Exception($str);
        }
    }
}
