<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('controller/controller.php');
require_once('PHPMailer/src/PHPmailer.php');
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/SMTP.php');

class usersController extends controller
{
    
    public function sendMail()
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0 ;                                       // Enable verbose debug output
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
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            // Content
            $mail->isHTML(false);                                  // Set email format to HTML
            $mail->Subject = 'libreria';
            $mail->Body    = 'aca va el pin';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            var_dump($e);
            $mail->ErrorInfo;
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
        $email = $_POST['email'];
        if (empty($name) || empty($pass) || empty($email)) {
            $this->getLoginView()->showErrorLogin('completar todos los campos', 1);
            die();
        }
        $userDB = $this->getUserModel()->getUserDB($name);
        if ($userDB != false) {
            $this->getLoginView()->showErrorLogin('Ya existe un usuario con ese nombre');
            die();
        }
        $encryptedPass = password_hash($pass, PASSWORD_DEFAULT);
        $result = $this->getUserModel()->newUser($name, $encryptedPass, $email);
        if ($result == false)
            $this->getLoginView()->showErrorLogin('error 500');
        else {
            $userDB = $this->getUserModel()->getUserDB($name);
            AuthHelper::login($userDB);
        }
    }
}
