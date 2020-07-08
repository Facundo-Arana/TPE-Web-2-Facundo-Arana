<?php
require_once('helpers/auth.helper.php');
require_once('model/bookModel.php');
require_once('model/genreModel.php');
require_once('model/userModel.php');
require_once('model/tokenModel.php');
require_once('views/bookView.php');
require_once('views/adminView.php');
require_once('views/errorView.php');
require_once('views/loginView.php');

class controller
{
    private $authHelper;
    private $genreModel;
    private $bookModel;
    private $userModel;
    private $bookView;
    private $adminView;
    private $errorView;
    private $loginView;
    private $tokenModel;

    public function __construct()
    {
        $this->authHelper = new authHelper();
        $this->genreModel = new genreModel();
        $this->bookModel = new bookModel();
        $this->userModel = new userModel();
        $this->tokenModel = new tokenModel();
        $this->bookView = new bookView();
        $this->adminView = new adminView();
        $this->errorView = new errorView();
        $this->loginView = new loginView();
    }

    public function getBookModel()
    {
        return $this->bookModel;
    }

    public function getGenreModel()
    {
        return $this->genreModel;
    }

    public function getUserModel()
    {
        return $this->userModel;
    }
    public function getTokenModel()
    {
        return $this->tokenModel;
    }
    
    public function getBookView()
    {
        return $this->bookView;
    }

    public function getAdminView()
    {
        return $this->adminView;
    }

    public function getUserData()
    {
        $data = AuthHelper::getUserData();
        return $data;
    }

    public function getErrorView()
    {
        return $this->errorView;
    }

    public function getLoginView()
    {
        return $this->loginView;
    }

}
