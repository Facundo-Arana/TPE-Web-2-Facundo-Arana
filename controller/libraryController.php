<?php
require_once('controller/controller.php');

class libraryController extends controller
{
    private $username;
    private $genres;

    public function __construct()
    {
        parent::__construct();
        $this->genres = $this->getGenreModel()->getAllGenresDB();
        $this->username = AuthHelper::getUsername();
    }

    /**
     *  Muestra la pagina home donde ya se puede explorar el catalogo de libros.
     */
    public function getHome()
    {
        $this->getBookView()->showHome($this->genres, $this->username);
    }

    /** 
     *  Obtener todos los registros de libros.
     */
    public function getAllBooks()
    {
        $books = $this->getBookModel()->getAllBooksDB();
        if ($books == false)
            $this->getErrorView()->showErrorView('ocurrio un error durante la busqueda en la base de datos', 0);
        else
            $this->getBookView()->showBooksByGenre($this->genres, $books, $this->username);
    }

    /**
     *  Trae solo libros de un genero especifico.
     *  $genreName es el genero de libro que se quiere buscar.
     */
    public function getBooksByGenre($genreName)
    {
        $booksByGenre = $this->getBookModel()->getBooksByGenreDB($genreName);
     
        if ($booksByGenre == false)
            $this->getErrorView()->showErrorView('aun no hay registrados libros del genero ' . $genreName . '', 0);
        else
            $this->getBookView()->showBooksByGenre($this->genres, $booksByGenre, $this->username);
    }

    /**
     *  Trae solo un libro.
     *  $id es el nombre del genero que el ususario quiere buscar.
     */
    public function getBookDetails($id)
    {
        $book = $this->getBookModel()->getBookDetailsDB($id);

        if ($book == false)
            $this->getErrorView()->showErrorView('el libro no existe', 0);
        else
            $this->getBookView()->showBookDetails($this->genres, $book[0], $this->username);
    }


    /**
     *  Muetra el formulario de registro 
     */
    public function getLogin()
    {
        $this->getLoginView()->showLogin($this->username);
    }
}
