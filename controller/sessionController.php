<?php
include_once('view/adminView.php');
include_once('model/userModel.php');

class sessionController
{
    private $userModel;
    private $view;

    function __construct()
    {
        $this->view = new adminView();
        $this->userModel = new userModel();
    }

    public function verify($name, $pass)
    {
        if (empty($name) || empty($pass)) {
            $this->view->errorView('completar todos los campos');
            die();
        }

        $user = $this->userModel->getUserDB($name);
        
        if ($user == false) {
            $this->view->errorView('ocurrio un error durante la consulta');
            die();
        }

        if (empty($user[0])) {
            $this->view->errorView('nombre de usuario incorrecto');
            die();
        } 
        
        session_start();

        if($user[0]->adminPass == $pass){

            $_SESSION['id'] = $user[0]->id;
            $_SESSION['userName'] = $user[0]->userName;
            header('location:'. URLBASE .'library/admin');

        }else{
            $this->view->errorView('contraseña incorrecta');
        }

    }

    public function getAdminView(){
        session_start();
        if(!isset($_SESSION['userName'])){
            header('location:'. URLBASE .'library/login');
            die();
        }
        
        $this->view->showAdminView();
        
    }

    public function logOut(){
        session_destroy();
        header('location:'. URLBASE .'library/login');
    }


}
