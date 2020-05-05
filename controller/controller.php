<?php
include_once('view/view.php');
include_once('model/model.php');

class controller
{
    private $model;
    private $view;


    function __construct()
    {
        $this->view = new view();
        $this->model = new library();
    }

    function home(){
        $genres = $this->model->getAllGenres();
        $listOfGenres = $this->view->getGenresList($genres);
        $this->view->home($listOfGenres); 
    }    





}
