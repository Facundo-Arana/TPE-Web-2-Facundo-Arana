<?php
require_once('libs/Smarty.class.php');

class view
{

    private $smarty;
    
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }


    /**
     *  Muestra el login donde se registra el administrador.
     * 
     */
    public function showLogin()
    {     
        $this->smarty->display('templates/login.tpl'); 
    }








    /**
     *  Muestra la pagina para navegar por el sitio.
     *  
     * 
     */
    public function showAbout($listGenres)
    {    
        $this->smarty->assign('nav', $listGenres); 

        $this->smarty->display('templates/about.tpl'); 
    }










    /**
     *  TODO panatalla de error.
     * 
     */
    public function showErrorView($mensagge, $nav)
    {
        $this->smarty->assign('text', $mensagge);
        $this->smarty->assign('nav', $nav);

        $this->smarty->display('templates/error.tpl'); 
    }






    /**
     *  Muestra los libros de un genero especifico.
     * 
     */
    public function showBooksByGenre($listGenres,$booksByGenre)
    {
        $this->smarty->assign('nav', $listGenres);
        $this->smarty->assign('main', $booksByGenre);

        $this->smarty->display('templates/booksByGenre.tpl');    
    }

  





   

  
}
