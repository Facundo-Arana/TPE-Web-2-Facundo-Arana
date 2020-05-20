<?php
require_once('libs/Smarty.class.php');

class userView
{

    private $smarty;
    
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }

    /**
     *  Muestra la pagina principal para navegar por el sitio.
     *  
     * 
     */
    public function showHome($listGenres)
    {    
        $this->smarty->assign('nav', $listGenres); 
        $this->smarty->display('templates/home.tpl'); 
    }

    /**
     *  Muestra todos los libros de un genero especifico.
     * 
     */
    public function showBooksByGenre($listGenres, $booksByGenre, $genre)
    {
        $this->smarty->assign('nav', $listGenres);
        $this->smarty->assign('main', $booksByGenre);
        $this->smarty->assign('genero', $genre);
        $this->smarty->display('templates/booksByGenre.tpl');    
    }

    /**
     *  Muestra los detalles un libro especifico.
     * 
     */
    public function showBookDetails($listGenres, $genre, $book)
    {
        $this->smarty->assign('nav', $listGenres);
        $this->smarty->assign('book', $book);
        $this->smarty->assign('genero', $genre);
        $this->smarty->display('templates/bookDetails.tpl');  
    }

    /**
     *  Pantalla de error durante la navegacion del usuario.
     * 
     */
    public function showErrorView($mensagge)
    {
        $this->smarty->assign('text', $mensagge);  
        $this->smarty->display('templates/error.tpl'); 
    } 

      /**
     *  Muestra la pagina login.
     * 
     */
    public function showLogin()
    {     
        $this->smarty->display('templates/login.tpl'); 
    }

}
