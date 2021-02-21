<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('controller/controller.php');
require_once('external/PHPMailer/src/PHPMailer.php');
require_once('external/PHPMailer/src/Exception.php');
require_once('external/PHPMailer/src/SMTP.php');

class usersController extends controller
{
    /** 1er paso recuperacion de cuenta de usuario.
     * 
     *  Recibir datos proporcinados por el usuario para reestablecer contraseña.
     */
    public function checkUserToGetToken()
    {
        if (!isset($_POST['username'])) {
            $this->getLoginView()->showForgetForm('escribe tu nombre de usuario');
            die();
        }
        $username = $_POST['username'];

        // consulto los registros de usuarios.
        $userDB = $this->getUserModel()->getIdUser($username);
        if ($userDB == false) {
            $this->getLoginView()->showForgetForm('El nombre de usuario es incorrecto');
            die();
        }

        // borrar token si ya existe una para este usuario (solo se permite una a la vez por usuario).
        $this->getTokenModel()->deleteToken($userDB->id_user);

        // crear una clave unica
        $token =  strtoupper(uniqid());
        $hash = password_hash($token, PASSWORD_DEFAULT);

        // guardar token para el usuario en la bd.
        $this->getTokenModel()->setToken($hash, $userDB->id_user);

        // enviar clave al mail del usuario
        $mensaje = '<p>La clave para recuperar tu cuenta es: ' . $token . ' </p>';
        $response = self::sendToken($mensaje, $userDB->email);

        if ($response == true)
            $this->getLoginView()->showTokenForm($userDB->id_user);
        else {
            $this->getTokenModel()->deleteToken($userDB->id_user);
            $this->getLoginView()->showForgetForm('El mail con el que creaste la cuenta no sirve, agua y ajo');
        }
    }

    /** 
     * Enviar mail del usuario olvidadizo.
     */
    private static function sendToken($msj, $email)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug  = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                             // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
            $mail->Username   = 'tpe.web.2.library@gmail.com';           // SMTP username
            $mail->Password   = 'TUDAI1234';                             // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->setFrom('tpe.web.2.library@gmail.com', 'Virtual Library');

            // mail del usuario 
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Recuperacion cuenta biblioteca virtual WEB 2';
            $mail->Body    = $msj;

            // enviar 
            $exito = $mail->Send();
            $intentos = 1;
            while ((!$exito) && ($intentos < 5)) {
                sleep(3);
                $exito = $mail->Send();
                $intentos = $intentos + 1;
            }
            if ($exito)
                return true;
            else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }

    /** 2do paso recuperacion de cuenta de usuario.
     *   
     *  Verificacion de usuario.
     */
    public function checkToken()
    {
        if (!isset($_POST['user_id'])) {
            $this->getLoginView()->showForgetForm('Debes completar este paso primero');
            die();
        }
        $id = $_POST['user_id'];
        $token = $_POST['token'];

        // traigo la token que se genero especificamete para este usuario.
        $res = $this->getTokenModel()->getToken($id);

        // comparo la clave ingresada con la token de la base de datos.
        $response = password_verify($token, $res->hash);
        if ($response == true) {

            // cambio la contraseña del usuario por la clave dada de forma aleatoria. 
            $this->getUserModel()->setPassword($id, $res->hash);
            sleep(3);
            $userDB = $this->getUserModel()->getUserById($id);

            // eliminar la token de la base de datos (ya cumplio su funcion).
            $this->getTokenModel()->deleteToken($id);

            // aviso al usuario de la nueva contraseña.
            $mensaje = '<p>Recuperaste tu cuenta!!! tu nueva contraseña es la clave de recuperacion que recibiste anteriormente, recomendamos que la cambies</p>';
            $res = self::sendToken($mensaje, $userDB->email);
            // loguear al usuario.
            AuthHelper::login($userDB);
        } else {
            $this->getLoginView()->showTokenForm($id, 'la clave es incorrecta... vuelve a intentar');
        }
    }

    /**
     *  Cambiar contraseña.
     */
    public function editPassword()
    {
        if (empty($_POST['oldPass']) || empty($_POST['newPass']) || empty($_POST['username'])) {
            header('location:' . URLBASE . 'library/profile');
            die();
        }
        $result = $this->getUserModel()->checkPass($_POST['username'], $_POST['oldPass'], $_POST['newPass']);
        $genres = $this->getGenreModel()->getAllGenresDB();
        if ($result == false) {
            $this->getBookView()->showProfile($genres, $this->getUserData(), 'la contraseña es incorrecta');
        } else {
            $this->getBookView()->showProfile($genres, $this->getUserData(), 'cambiaste tu contraseña correctamente');
        }
    }

    /** 
     *  Verificacion de los datos de acceso de usuario.
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
        $userDB = $this->getUserModel()->getUserByName($name);
        if ($userDB == false) {
            $this->getLoginView()->showErrorLogin('nombre de usuario incorrecto');
            die();
        }
        $hash = $userDB->password;
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
        $email = $_POST['email'];
        if (empty($name) || empty($pass) || empty($email)) {
            $this->getLoginView()->showErrorLogin('completar todos los campos', 1);
            die();
        }
        $userDB = $this->getUserModel()->getUserByName($name);
        if ($userDB != false) {
            $this->getLoginView()->showErrorLogin('Ya existe un usuario con ese nombre');
            die();
        }
        $encryptedPass = password_hash($pass, PASSWORD_DEFAULT);
        $result = $this->getUserModel()->newUser($name, $encryptedPass, $email);
        if ($result == false)
            $this->getLoginView()->showErrorLogin('error 500');
        else {
            $userDB = $this->getUserModel()->getUserByName($name);
            AuthHelper::login($userDB);
        }
    }

    /**
     *  Llama a la vista que muesta el formulario de recuperacion de contraseña.
     */
    public function getForgetForm()
    {
        $this->getLoginView()->showForgetForm();
    }
}
