<?php
require_once('views/view.php');

class loginView extends view
{
    function __construct()
    {
        parent::__construct();
        $this->getSmarty()->assign('inLogin', 1);
    }

    /** 
     * Muestra el mensaje del error especifico en el login.  
     */
    public function showTokenForm($username)
    {

        $this->getSmarty()->assign('name', $username);
        $this->getSmarty()->display('templates/writeToken.tpl');
    }

    /** 
     * Muestra el mensaje del error especifico en el login.  
     */
    public function showForgetForm($msj = null)
    {
        if ($msj != null) {
            $this->getSmarty()->assign('msjr', $msj);
        }
        $this->getSmarty()->display('templates/forgetForm.tpl');
    }

    /**
     *  Muestra la pagina login.
     */
    public function showLogin($userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged']))
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
        }
        $this->getSmarty()->display('templates/login.tpl');
    }

    /** 
     * Muestra el mensaje del error especifico en el login.  
     */
    public function showErrorLogin($mensaggeLoginError, $newAccount = null)
    {
        if ($newAccount != null) {
            $this->getSmarty()->assign('newAccount', $newAccount);
        }
        $this->getSmarty()->assign('msj', $mensaggeLoginError);
        $this->getSmarty()->display('templates/login.tpl');
    }
}
