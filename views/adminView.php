<?php
require_once('views/view.php');

class adminView extends view
{
    /** Muestra la pantalla principal del administrador.
     * 
     *  @param name es el nombre del administrador que inicio sesion.
     *  @param genres es un objeto PDO con datos de la tabla 'genre' de la base de datos.
     */
    public function showAdminView($genres, $books, $userData = null, $users)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged']))
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
            if (isset($userData['id']))
                $this->getSmarty()->assign('user_id', $userData['id']);
        }
        $this->getSmarty()->assign('users', $users);
        $this->getSmarty()->assign('genres', $genres);
        $this->getSmarty()->assign('books', $books);
        $this->getSmarty()->display('templates/adminView.tpl');
    }

    /** 
     * Muestra un mensaje de exito en una operacion.
     */
    public function showAdminSuccess($mensaggeSuccess, $userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged']))
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
            if (isset($userData['id']))
                $this->getSmarty()->assign('user_id', $userData['id']);
        }
        $this->getSmarty()->assign('msj', $mensaggeSuccess);
        $this->getSmarty()->display('templates/success.tpl');
    }
}
