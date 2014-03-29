<?php
/**
 * Class Cotroller Just Controller you r Controller Pgaes Its Also Attacged to Model If you are using database
 * or some thingto get or insert What Ever You Like.....
 * extends Controlller
 */
class Controller
{
    public function __construct() 
    {
        $this->page = new View();
    }
    public function useModel($name)
    {
        $fileName = 'models/'.$name.'_model.php';
        
        if(file_exists($fileName))
        {
            require 'models/'.$name.'_model.php';
            
            $ModelName = $name.'_Model';
            $this->model = new $ModelName();
          //  return FALSE;
        }
    }
}
