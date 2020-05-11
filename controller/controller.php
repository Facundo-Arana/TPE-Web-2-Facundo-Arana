<?php
include_once('view/view.php');
include_once('model/bookModel.php');
include_once('model/genreModel.php');

class controller
{
    private $genreModel;
    private $bookModel;
    private $view;

    function __construct()
    {
        $this->view = new view();
        $this->genreModel = new genreModel();
        $this->bookModel = new bookModel();
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
     *  Muestra la pagina about donde ya se puede explorar el catalogo de libros.
     */
    public function getAbout()
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $this->view->showAbout($listGenres);
    }





    /**
     *  Recontruye la URL de forma que las palabras queden separadas por espacios.
     * 
     */
    public function construct_URL($name)
    {
        $split = explode("-", $name);

        if (!isset($split[1]))
            $genre = $split[0];

        elseif (!isset($split[2]))
            $genre = $split[0] . ' ' . $split[1];

        else
            $genre = $split[0] . ' ' . $split[1] . ' ' . $split[2];

        return $genre;
    }






    /**
     *  Trae solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     * 
     */
    public function getBooksByGenre($name)
    {
        $genre = $this->construct_URL($name);

        $listGenres = $this->genreModel->getAllGenresDB();

        $booksByGenre = $this->bookModel->getBooksByGenreDB($genre);

        if (empty($booksByGenre))
            $this->showError('aun no hay registrados libros del genero ' . $name . '');

        elseif ($booksByGenre == false)
            $this->showError('ocurrio un error durante la busqueda');

        else {
            $this->view->showBooksByGenre($listGenres, $booksByGenre, $name);
        }
    }



    /**
     *  Trae solo un libro.
     * 
     */
    public function getBookDetails($name, $book)
    {
        $genre = $this->construct_URL($name);

        $listGenres = $this->genreModel->getAllGenresDB();

        $book = $this->bookModel->getBookDetailsDB($book);
       
        if ($book == false)
            $this->showError('ocurrio un error durante la busqueda de este libro especifico');

        else {
           
            $this->view->showBookDetails($listGenres, $genre, $book[0]);
        }
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
