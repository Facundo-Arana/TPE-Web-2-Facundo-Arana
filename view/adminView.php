<?php
require_once('libs/Smarty.class.php');

class adminView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }

    /** #Muestra la pantalla principal del administrador.
     * 
     *  @param name es el nombre del administrador que inicio sesion.
     *  @param genres es un objeto PDO con datos de la tabla 'genre' de la base de datos.
     */
    public function showAdminView($name, $genres)
    {
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('user', $name);
        $this->smarty->display('templates/adminView.tpl');
    }

    /** #Muestra el mensaje del error especifico en el login. 
     * 
     */
    public function showErrorLogin($mensaggeLoginError)
    {
        $this->smarty->assign('msj', $mensaggeLoginError);
        $this->smarty->display('templates/login.tpl');
    }

    /** #Muestra un mensaje de error del administrador.
     * 
     */
    public function showErrorAdmin($mensaggeError)
    {
        $this->smarty->assign('msj', $mensaggeError);
        $this->smarty->display('templates/error.tpl');
    }

    /** #Muestra un mensaje de exito en una operacion.
     * 
     */
    public function showAdminSuccess($mensaggeSuccess)
    {
        $this->smarty->assign('msj', $mensaggeSuccess);
        $this->smarty->display('templates/success.tpl');
    }
}
