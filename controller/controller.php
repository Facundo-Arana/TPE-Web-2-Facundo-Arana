<?php
include_once('view/view.php');
include_once('model/model.php');

class controller
{
    private $model;
    private $view;

    function __construct()
    {
        $this->view = new view();
        $this->model = new catalogue();
    }

    /**
     *  Muetra el formulario de registro index.php
     * 
     * 
     */
    function getIndex()
    {
        $this->view->showIndex();
    }



    /**
     *  Genera una lista con los generos para la navegacion del sitio.
     *  
     */
    private function createListOfGenres()
    {
        $arrayGenres = $this->model->getAllGenresDB();
        $listOfGenres = $this->view->getGenresList($arrayGenres);
        return $listOfGenres;
    }

    /**
     *  Genera una lista de libros por genero.
     * 
     */
    private function createListOfBooksByGenre($genre){
        $arrayOfBooks = $this->model->getBooksByGenreDB($genre);
        $booksDetails = $this->view->showBooksDatails($arrayOfBooks);
        return $booksDetails;
    }

    /**
     *  Muestra la pagina about donde ya se puede explorar el catalogo de libros.
     */
    function getAbout()
    {
        $sideListGenres = $this->createListOfGenres();
        $this->view->showAbout($sideListGenres);
    }


    /**
     *  Muestra solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     * 
     */
    function getBooksByGenre($genre)
    {
        $sideListGenres = $this->createListOfGenres();
        $booksByGenre = $this->createListOfBooksByGenre($genre);
        $this->view->showBooksByGenre($sideListGenres, $booksByGenre);
    }



    /**
     *  Muestra en pantalla que hubo un error.
     * 
     */
    function error()
    {
        $this->view->showError();
    }
}
