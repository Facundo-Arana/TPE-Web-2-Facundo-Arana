<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('controller/controller.php');
require_once('PHPMailer/src/PHPmailer.php');
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/SMTP.php');

class usersController extends controller
{

    public function checkToken(){

        $username = $_POST['user'];
        $token = $_POST['token'];

        $res = $this->getTokenModel()->getTokenByUser($username);
        $response = password_verify($token, $res[0]->hash);
        if($response == true){
            //TODO editar contraseña de usuario (model y form).

        }
    }

    /**
     * Verificar los datos proporcinados por el usuario para reestablecer contraseña.
     */
    public function checkUserToGetToken()
    {
        if (!isset($_POST['username'])) {
            $this->getLoginView()->showForgetForm('escribe tu nombre de usuario');
            die();
        }
        $username = $_POST['username'];

        // consulto los registros de usuarios.
        $userDB = $this->getUserModel()->getUsername($username);
        if ($userDB == false) {
            $this->getLoginView()->showForgetForm('El nombre de usuario es incorrecto');
            die();
        }

        // borrar token si ya existe una para este usuario (solo se permite una a la vez por usuario).
        $this->getTokenModel()->deleteToken($username);

        // crear una clave unica
        $token =  strtoupper(uniqid());
        $hash = password_hash($token, PASSWORD_DEFAULT);

        // guardar token para el usuario en la bd.
        $this->getTokenModel()->setToken($hash, $username);
        $response = self::sendToken($token, $userDB[0]->email);
        if ($response == true)
            $this->getLoginView()->showTokenForm($username);
        else
            $this->getLoginView()->showForgetForm('El mail con el que creaste la cuenta no sirve, agua y ajo');
    }

    /**
     * Enviar token al mail del usuario olvidadizo.
     */
    private static function sendToken($token, $email)
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

            //Recipients
            $mail->setFrom('tpe.web.2.library@gmail.com', 'Virtual Library');
            //$mail->addAddress('joe@example.net', 'Joe User');                // Add a recipient
            $mail->addAddress('facundoaranaloberia@gmail.com');                         // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Validacion de usuario de biblioteca virtual WEB 2';
            $mail->Body    = ' <p> La clave para poder recuperar tu cuenta es: ' . $token . '</p>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $exito = $mail->Send();

            $intentos = 1;
            while ((!$exito) && ($intentos < 5)) {
                sleep(5);
                $exito = $mail->Send();
                $intentos = $intentos + 1;
            }
            if ($exito)
                return true;
            else
                return false;
        } catch (Exception $e) {
            var_dump($e);
            $mail->ErrorInfo;
            return false;
        }
    }


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
        $userDB = $this->getUserModel()->getUserByName($name);
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
