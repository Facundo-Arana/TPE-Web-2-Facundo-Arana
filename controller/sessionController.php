<?php
include_once('view/adminView.php');
include_once('model/userModel.php');
include_once('model/genreModel.php');

class sessionController
{
    private $genreModel;
    private $userModel;
    private $view;

    function __construct()
    {
        $this->view = new adminView();
        $this->userModel = new userModel();
        $this->genreModel = new genreModel();
    }

    /** #Verificacion de los datos de registro del administrador.
     * 
     *  @param name es el nombre del administrador que se quiere loguear.
     *  @param pass es la contraseña ingresada por el administrador.
     *  @param user 
     */
    public function verify($name, $pass)
    {
        if (empty($name) || empty($pass)) {
            $this->view->showErrorLogin('completar todos los campos');
            die();
        }
        $user = $this->userModel->getUserDB($name);
        if ($user == false) {
            $this->view->showErrorLogin('nombre de usuario incorrecto');
            die();
        }
        if ($user[0]->adminPass != $pass)
            $this->view->showErrorLogin('contraseña incorrecta');
        else {
            session_start();
            $_SESSION['id'] = $user[0]->id;
            $_SESSION['userName'] = $user[0]->userName;
            header('location:' . URLBASE . 'library/admin');
        }
    }

    /** #Mostrar la vista del administrador solo si hay una sesion iniciada.
     * 
     *  @param _SESSION['userName'] es el nombre del administrador que inicio la sesion.
     *   En caso de no haber una sesion iniciada se mostrara un error en el login.
     */
    public function getAdminView()
    {
        session_start();
        if (!isset($_SESSION['userName']))
            $this->view->showErrorLogin('Acceso negado... debes inicar sesion');
        else {
            $genres = $this->genreModel->getAllGenresDB();
            $this->view->showAdminView($_SESSION['userName'], $genres);
        }
    }

    /** #Cerrar una sesion y borrar las variables.
     * 
     *  @param _SESSION['userName'] es el nombre del administrador inicio la sesion.
     *  @param _SESSION['id'] es el id del administrador inicio la sesion.
     */
    public function logOut()
    {
        session_start();
        unset($_SESSION['userName']);
        unset($_SESSION['id']);
        session_destroy();
        header('location:' . URLBASE . 'library/login');
    }
}
