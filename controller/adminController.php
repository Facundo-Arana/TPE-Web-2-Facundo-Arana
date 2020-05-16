<?php
include_once('view/adminView.php');
include_once('model/bookModel.php');
include_once('model/genreModel.php');


class adminController
{
    private $userModel;
    private $genreModel;
    private $bookModel;
    private $view;

    function __construct()
    {
        $this->view = new adminView();
        $this->genreModel = new genreModel();
        $this->bookModel = new bookModel();
        $this->userModel = new userModel();
    }

    public function getAdminView(){

        $this->view->showAdminView();
    }

}
