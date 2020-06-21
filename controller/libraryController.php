<?php
require_once('controller/controller.php');

class libraryController extends controller
{
    private $userData;
    private $genres;

    public function __construct()
    {
        parent::__construct();
        $this->genres = $this->getGenreModel()->getAllGenresDB();
        $this->userData = AuthHelper::getUserData();
    }

    /**
     *  Muestra la pagina home donde ya se puede explorar el catalogo de libros.
     */
    public function getHome()
    {
        $this->getBookView()->showHome($this->genres, $this->userData);
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
            $this->getBookView()->showAllBooks($this->genres, $books, $this->userData);
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
            $this->getBookView()->showBooksByGenre($this->genres, $booksByGenre, $this->userData);
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
            $this->getBookView()->showBookDetails($this->genres, $book, $this->userData);
    }


    /**
     *  Muetra el formulario de registro 
     */
    public function getLogin()
    {
        $this->getLoginView()->showLogin($this->userData);
    }
}
