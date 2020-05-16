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
    public function getHome()
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $this->view->showHome($listGenres);
    }

    /**
     *  Prepara una seccion de la URL de forma que las palabras queden separadas por espacios " ".
     * 
     */
    public function prepare_URL($name)
    {
        $split = explode("-", $name);
        $correctedName = implode(' ', $split);
        return $correctedName;
    }

    /**
     *  Prepara una seccion de la URL de forma que las palabras queden separadas por "-".
     * 
     */
    public function construct_URL($name)
    {                                                   
        $split = explode(" ", $name);
        $correctedName = implode('-', $split);
        return $correctedName;
    }

    /**
     *  Trae solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     * 
     */
    public function getBooksByGenre($name)
    {
        $genre = $this->prepare_URL($name);

        $listGenres = $this->genreModel->getAllGenresDB();

        $booksByGenre = $this->bookModel->getBooksByGenreDB($genre);

        $nameURL = array();
        foreach($booksByGenre as $book){
            $nameURL[] = $this->construct_URL($book->name);
        }

        if (empty($booksByGenre))
            $this->showError('aun no hay registrados libros del genero ' . $name . '');

        elseif ($booksByGenre == false)
            $this->showError('ocurrio un error durante la busqueda');

        else {          
            $this->view->showBooksByGenre($listGenres, $booksByGenre, $name, $nameURL);
        }
    }

    /**
     *  Trae solo un libro.
     *  $name es el nombre del genero que el ususario quiere buscar.
     */
    public function getBookDetails($genreName, $id)
    {
        $genre = $this->construct_URL($genreName);

        $listGenres = $this->genreModel->getAllGenresDB();

        $book = $this->bookModel->getBookDetailsDB($id);
       
        

        if ($book == false)
            $this->showError('ocurrio un error durante la busqueda de este libro en la base de datos');
        
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
