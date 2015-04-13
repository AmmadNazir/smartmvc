<?php

class Controller 
{
    function __construct() 
    {
        $this->load = new View();
//        $this->load = new Uploads();
//        $this->load = new Form_Validation();
    }
    
    /**
     * 
     * @param string $name Name of the model
     * @param string $modelPath Location of the models
     */
    public function useModel($name, $modelPath = 'models/') {
        
        $path = $modelPath . $name.'_model.php';
        
        if (file_exists($path)) 
            {
                require $modelPath .$name.'_model.php';

                $modelName = $name . '_Model';
                $this->model = new $modelName();
            }        
    }

}