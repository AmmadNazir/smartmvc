<?php
/*
 * Class Model Just Connected Too The DataBase
 */
class Model
{
    public function __construct() 
    {
        $this->db = new Database();
    }
}
