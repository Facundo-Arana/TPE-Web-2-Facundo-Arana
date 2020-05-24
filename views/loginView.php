<?php
require_once('views/view.php');

class loginView extends view
{
    /**
     *  Muestra la pagina login.
     */
    public function showLogin()
    {
        $this->getSmarty()->display('templates/login.tpl');
    }
    
    /** 
     * Muestra el mensaje del error especifico en el login.  
     */
    public function showErrorLogin($mensaggeLoginError)
    {
        $this->getSmarty()->assign('msj', $mensaggeLoginError);
        $this->getSmarty()->display('templates/login.tpl');
    }

}
