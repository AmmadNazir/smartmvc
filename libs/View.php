<?php
/*
 * Class View is Make view or Visibale you page you have design Jusyt Like You Want 
 *                                                                                 The true Path Is Views/Index/Index.php dont use ext
 * Command is $this->page->view('page path') !! importnat Dont Use Space... exp ! $this->page->view('index/index');
 * You Can Also Use $this->page->view('footer'); this path is Views/footer.php
 * can use Both way
 * (i) . $this->page->view('index/index;);
 * (ii) . $this->page->view('index');
 *  ()4 Mke Class to views
 */
class View 
{
    public function __construct() {}

    public function view($name, $noInclude = false)
    {
        require 'views/' . $name . '.php';    
    }
}