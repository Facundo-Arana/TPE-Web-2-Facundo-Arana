<?php
require_once('views/view.php');

class errorView extends view
{
    /**
     *  Pantalla de error durante la navegacion del usuario.
     */
    public function showErrorView($mensagge, $number, $username = null)
    {
        if ($username != null)
            $this->getSmarty()->assign('username', $username);
        $this->getSmarty()->assign('number', $number);
        $this->getSmarty()->assign('text', $mensagge);
        $this->getSmarty()->display('templates/error.tpl');
    }
}
