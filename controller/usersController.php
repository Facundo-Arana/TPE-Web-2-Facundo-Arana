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
        if (isset($_GET['guest'])) {
            AuthHelper::guestAccess();
            die();
        }
        $name = $_POST['user'];
        $pass = $_POST['password'];
        if (empty($name) || empty($pass)) {
            $this->getLoginView()->showErrorLogin('completar todos los campos');
            die();
        }
        $userDB = $this->getUserModel()->getUserDB($name);
        if ($userDB == false) {
            $this->getLoginView()->showErrorLogin('nombre de usuario incorrecto');
            die();
        }
        $hash = $userDB[0]->password;
        $response = password_verify($pass, $hash);
        if ($response == false)
            $this->getLoginView()->showErrorLogin('contraseña incorrecta');
        else
            AuthHelper::login($userDB);
    }

    /**
     * verificar que no existan dos usuarios con el mismo nombre. 
     * añadir un nuevo ususario a la base de datos.
     */
    public function validate()
    {
        $name = $_POST['user'];
        $pass = $_POST['password'];
        if (empty($name) || empty($pass)) {
            $this->getLoginView()->showErrorLogin('completar todos los campos', 1);
            die();
        }
        $userDB = $this->getUserModel()->getUserDB($name);
        if ($userDB != false) {
            $this->getLoginView()->showErrorLogin('Ya existe un usuario con ese nombre');
            die();
        }
        $encryptedPass = password_hash($pass, PASSWORD_DEFAULT);
        $result = $this->getUserModel()->newUser($name, $encryptedPass);
        if($result == false)
            $this->getLoginView()->showErrorLogin('error 500');
        else
            header('location:'. URLBASE . 'library/verify');
    }

}
