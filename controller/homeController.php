<?php
require_once('controller/controller.php');

class homeController extends controller
{
    /**
     *  Muestra la pagina home donde ya se puede explorar el catalogo de libros.
     */
    public function getHome()
    {
        $listGenres = $this->getGenreModel()->getAllGenresDB();
        $this->getHomeView()->showHome($listGenres);
    }

    /**
     *  Trae solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     */
    public function getBooksByGenre($genreName)
    {
        $listGenres = $this->getGenreModel()->getAllGenresDB();
        $booksByGenre = $this->getBookModel()->getBooksByGenreDB($genreName);
        if ($booksByGenre == false)
            $this->getErrorView()->showErrorView('aun no hay registrados libros del genero ' . $genreName . '', 0);
        else
            $this->getHomeView()->showBooksByGenre($listGenres, $booksByGenre, $genreName);
    }

    /**
     *  Trae solo un libro.
     *  $name es el nombre del genero que el ususario quiere buscar.
     */
    public function getBookDetails($genreName, $id)
    {
        $listGenres = $this->getGenreModel()->getAllGenresDB();
        $book = $this->getBookModel()->getBookDetailsDB($id);
        if ($book == false)
            $this->getErrorView()->showErrorView('ocurrio un error durante la busqueda de este libro en la base de datos', 0);
        else
            $this->getHomeView()->showBookDetails($listGenres, $genreName, $book[0]);
    }

    /** 
     *  Obtener todos los registros de libros.
     */
    public function getAllBooks()
    {
        $listGenres = $this->getGenreModel()->getAllGenresDB();
        $books = $this->getBookModel()->getAllBooksDB();
        if ($books == false)
            $this->getErrorView()->showErrorView('ocurrio un error durante la busqueda en la base de datos', 0);
        else
            $this->getHomeView()->showBooksByGenre($listGenres, $books, 'allBooks');
    }

    /**
     *  Muetra el formulario de registro index.php
     */
    public function getLogin()
    {
        $this->getLoginView()->showLogin();
    }

}
