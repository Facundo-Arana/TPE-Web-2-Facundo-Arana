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
     *  Muestra la pagina login.
     */
    public function showLogin($username)
    {
        $this->getSmarty()->assign('user', $username);
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
