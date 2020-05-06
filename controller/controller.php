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
     *  Muestra la pagina explorar el catalogo de libros.
     * 
     * 
     */
    function getAbout()
    {
        $genres = $this->model->getAllGenresDB();
        $listOfGenres = $this->view->getGenresList($genres);
        $this->view->getAboutDB($listOfGenres);
    }


    /**
     *  Muestra la lista de libros de un genero especifico.
     *  $genre es el genero del que se quiere buscar los libros.
     * 
     */
    function getGenreDetails($genre)
    {
        $booksByGenre = $this->model->getBooksByGenre($genre);
        var_dump($booksByGenre);die;
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
