<?php
/**
 *
 * - Fill out a form
 *    - POST to PHP
 *  - Sanitize
 *  - Validate
 *  - Return Data
 *  - Write to Database
 
 */
// Val i short form of validator
class Val 
{    
    public function minlength($data, $arg)
    {
        if (strlen($data) < $arg) 
            {
                return "Your string can only be $arg long";
            }
    }
    
    public function maxlength($data, $arg)
    {
        if (strlen($data) > $arg) 
            {
                return "Your string can only be $arg long";
            }
    }
    
    public function digit($data)
    {
        if (ctype_digit($data) == false) 
            {
                // return header('location:'.URL.'?dig');
                return "Your string must be a digit";
            }
    }
    
    public function __call($name, $arguments) 
    {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }
}

class Form_Validation
{
    
    /** @var array $_currentItem The immediately posted item*/
    private $_currentItem = null;
    
    /** @var array $_postData Stores the Posted Data */
    private $_postData = array();
    
    /** @var object $_val The validator object */
    private $_val = array();
    
    /** @var array $_error Holds the current forms errors */
    private $_error = array();
    
   // protected $_POST;
    /**
     * __construct - Instantiates the validator class
     * 
     */
    public function __construct() 
    {
        $this->_val = new Val();
    }
    
    /**
     * post - This is to run $_POST
     * 
     * @param string $field - The HTML fieldname to post
     */
    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
        
        $this->_currentItem = $field;
        
        return $this;
    }
    /**
     * fetch - Return the posted data
     * 
     * @param mixed $fieldName
     * 
     * @return mixed String or array
     */
    public function fetch($fieldName = false)
    {
        if ($fieldName) 
        {
            if (isset($this->_postData[$fieldName])) 
                {
                return $this->_postData[$fieldName];
                } 
            else 
                {
                return false;
                }
        } 
        else 
        {
            return $this->_postData;
        }
    }
    
    /**
     * val - This is to validate
     * 
     * @param string $typeOfValidator A method from the Form/Val class
     * @param string $arg A property to validate against
     */
    public function val($typeOfValidator, $arg = null)
    {
        if ($arg == null) 
            {
                $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
            } 
        else 
            {
                $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
            }
        if ($error) 
            {
                $this->_error[$this->_currentItem] = $error;
            }

        return $this;
    }
    
    /**
     * submit - Handles the form, and throws an exception upon error.
     * 
     * @return boolean
     * 
     * @throws Exception 
     */
    public function submit()
    {
        if (empty($this->_error)) 
        {
            return true;
        } 
        else 
        {
            $str = '';
            // $this->_error as $key => $value
            foreach ($this->_error as $value)
            {
                $str .= $key . ' => ' . $value . "\n";
            // $key;
                $str .=  "<div class='alert alert-danger'>" . $value . "</div>";
             //   header("location:".URL."?error=$value");
            }
            throw new Exception($str);
           //  echo '<div class"alert alert-danger">'.$str.'</div>';
        }
    }
}