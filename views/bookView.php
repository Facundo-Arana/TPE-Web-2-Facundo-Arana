<?php
require_once('views/view.php');

class bookView extends view
{
    /**
     *  Muestra la pagina principal para navegar por el sitio. 
     */
    public function showHome($listGenres, $userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged'])){
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
            }
        }
        $this->getSmarty()->assign('genres', $listGenres);
        $this->getSmarty()->display('templates/home.tpl');
    }

    /**
     *  Muestra todos los libros existentes. 
     */
    public function showAllBooks($listGenres, $allBooks, $userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged'])){

                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
            }
        }
        $this->getSmarty()->assign('genres', $listGenres);
        $this->getSmarty()->assign('books', $allBooks);
        $this->getSmarty()->display('templates/allBooks.tpl');
    }

    /**
     *  Muestra todos los libros de un genero especifico.
     */
    public function showBooksByGenre($listGenres, $booksByGenre, $userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged'])){
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
            }
        }
        $this->getSmarty()->assign('genres', $listGenres);
        $this->getSmarty()->assign('books', $booksByGenre);
        $this->getSmarty()->display('templates/booksByGenre.tpl');
    }

    /**
     *  Muestra los detalles un libro especifico.
     */
    public function showBookDetails($listGenres, $book, $userData = null)
    {
        if ($userData != null) {
            $this->getSmarty()->assign('username', $userData['userName']);
            $this->getSmarty()->assign('priority', $userData['priority']);
            if (isset($userData['is_logged'])) {
                $this->getSmarty()->assign('is_logged', $userData['is_logged']);
                $this->getSmarty()->assign('id_user', $userData['id']);
            }
        }
        $this->getSmarty()->assign('genres', $listGenres);
        $this->getSmarty()->assign('book', $book);
        $this->getSmarty()->display('templates/bookDetails.tpl');
    }
}
