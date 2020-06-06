<?php
require_once('views/view.php');

class adminView extends view
{
    /** #Muestra la pantalla principal del administrador.
     * 
     *  @param name es el nombre del administrador que inicio sesion.
     *  @param genres es un objeto PDO con datos de la tabla 'genre' de la base de datos.
     */
    public function showAdminView($genres, $books, $username)
    {
        $this->getSmarty()->assign('user', $username);
        $this->getSmarty()->assign('genres', $genres);
        $this->getSmarty()->assign('books', $books);
        $this->getSmarty()->display('templates/adminView.tpl');
    }

    /** 
     * Muestra un mensaje de exito en una operacion.
     */
    public function showAdminSuccess($mensaggeSuccess)
    {
        $this->getSmarty()->assign('msj', $mensaggeSuccess);
        $this->getSmarty()->display('templates/success.tpl');
    }
}
