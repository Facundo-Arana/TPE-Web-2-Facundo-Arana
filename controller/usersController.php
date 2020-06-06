<?php
require_once('controller/controller.php');

class usersController extends controller
{
    /** 
     *  Verificacion de los datos de registro del administrador.
     *  @param userDB sera falso si es que no existe un usuario con ese nombre en la base de datos.
    */
    public function verify()
    {
        $name = $_POST['user'];
        $pass = $_POST['password'];
        if (empty($name) || empty($pass)) {
            $this->getLoginView()->showErrorLogin('completar todos los campos');
            die();
        }

        $userDB = $this->getUserModel()->getUserDB($name);
        // el nombre de administrador correcto es admin.
        if ($userDB == false) {
            $this->getLoginView()->showErrorLogin('nombre de usuario incorrecto');
            die();
        }

        $hash = $userDB[0]->adminPass;
        // la contraseña correcta es 1234. (en la db hay guardado un valor encriptado equivalente a 1234)
        $response = password_verify($pass, $hash);

        if ($response == false)
            $this->getLoginView()->showErrorLogin('contraseña incorrecta');
        else
            AuthHelper::login($userDB);
    }
}