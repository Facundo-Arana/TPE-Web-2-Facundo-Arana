<?php
include_once('view/userView.php');
include_once('model/bookModel.php');
include_once('model/genreModel.php');

class userController
{
    private $genreModel;
    private $bookModel;
    private $view;

    function __construct()
    {
        $this->view = new userView();
        $this->genreModel = new genreModel();
        $this->bookModel = new bookModel();
    }

    /**
     *  Muestra la pagina home donde ya se puede explorar el catalogo de libros.
     */
    public function getHome()
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $this->view->showHome($listGenres);
    }

    /**
     *  Trae solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     * 
     */
    public function getBooksByGenre($genreName)
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $booksByGenre = $this->bookModel->getBooksByGenreDB($genreName);
        if ($booksByGenre == false)
            $this->showError('aun no hay registrados libros del genero ' . $genreName . '');
        else
            $this->view->showBooksByGenre($listGenres, $booksByGenre, $genreName);
    }

    /**
     *  Trae solo un libro.
     *  $name es el nombre del genero que el ususario quiere buscar.
     */
    public function getBookDetails($genreName, $id)
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $book = $this->bookModel->getBookDetailsDB($id);
        if ($book == false)
            $this->showError('ocurrio un error durante la busqueda de este libro en la base de datos');
        else
            $this->view->showBookDetails($listGenres, $genreName, $book[0]);
    }

    /** #obtener todos los registros de libros.
     * 
     */
    public function getAllBooks()
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $books = $this->bookModel->getAllBooksDB();
        if ($books == false)
            $this->showError('ocurrio un error durante la busqueda en la base de datos');
        else
            $this->view->showBooksByGenre($listGenres, $books, 'all');
    }

    /**
     *  Muetra el formulario de registro index.php
     * 
     */
    public function getLogin()
    {
        $this->view->showLogin();
    }

    /**
     *  Muestra en pantalla que hubo un error.
     * 
     */
    public function showError($mensegge)
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $this->view->showErrorView($mensegge, $listGenres);
    }
}
