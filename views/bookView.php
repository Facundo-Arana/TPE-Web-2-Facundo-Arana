<?php
require_once('views/view.php');

class bookView extends view
{    
    /**
     *  Muestra la pagina principal para navegar por el sitio. 
     */
    public function showHome($listGenres, $username)
    {    
        $this->getSmarty()->assign('user', $username);
        $this->getSmarty()->assign('genres', $listGenres); 
        $this->getSmarty()->display('templates/home.tpl'); 
    }

    /**
     *  Muestra todos los libros de un genero especifico.
     */
    public function showBooksByGenre($listGenres, $booksByGenre, $username)
    {
        $this->getSmarty()->assign('user', $username);
        $this->getSmarty()->assign('genres', $listGenres);
        $this->getSmarty()->assign('books', $booksByGenre);
        $this->getSmarty()->display('templates/booksByGenre.tpl');    
    }

    /**
     *  Muestra los detalles un libro especifico.
     */
    public function showBookDetails($listGenres, $book, $username)
    {
        $this->getSmarty()->assign('user', $username);
        $this->getSmarty()->assign('genres', $listGenres);
        $this->getSmarty()->assign('book', $book);
        $this->getSmarty()->display('templates/bookDetails.tpl');  
    }

}
