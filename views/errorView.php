<?php
require_once('views/view.php');

class errorView extends view
{
    /**
     *  Pantalla de error durante la navegacion del usuario.
     */
    public function showErrorView($mensagge, $userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged']))
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
        }
        $this->getSmarty()->assign('text', $mensagge);
        $this->getSmarty()->display('templates/error.tpl');
    }
}
