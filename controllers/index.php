<?php

class Index extends Controller
{
    public function __construct(){parent::__construct();}

    public function index()
    {
        $this->page->view('index');
    }
    public function other($args = FALSE)
    {
        echo $args;
    }
}