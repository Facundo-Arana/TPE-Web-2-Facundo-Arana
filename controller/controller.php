<?php



class controller
{
    private $model;
    private $view;


    function __construct()
    {
        $this->view = new view();
    }
}
