<?php
require_once('libs/Smarty.class.php');

class view
{


    /**
     *  Muestra el index donde se regustra el administrador.
     * 
     */
    public function showIndex()
    {
        $smarty = new Smarty();
        $smarty->assign('url', URLBASE);
        $smarty->display('templates/index.tpl'); 
    }








    /**
     *  Muestra la pagina para navegar por el sitio.
     *  
     * 
     */
    public function showAbout($listGenres)
    {
        $smarty = new Smarty();
        $smarty->assign('url', URLBASE);
        $smarty->assign('side', $listGenres);
        
        $smarty->display('templates/about.tpl'); 
    }










    /**
     *  TODO panatalla de error.
     * 
     */
    public function showError()
    {
        $smarty = new Smarty();
        $smarty->assign('url', URLBASE);
        $smarty->display('templates/error.tpl'); 
    }




    /**
     *  Muestra los libros de un genero especifico.
     * 
     */
    public function showBooksByGenre($listGenres,$booksByGenre)
    {
        $smarty = new Smarty();
        $smarty->assign('url', URLBASE);
        $smarty->assign('side', $listGenres);
        $smarty->assign('main', $booksByGenre);


        $smarty->display('templates/booksByGenre.tpl'); 
        
    }

  





   

  
}
