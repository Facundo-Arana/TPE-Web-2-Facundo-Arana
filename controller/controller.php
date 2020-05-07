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
     *  Muestra la pagina about donde ya se puede explorar el catalogo de libros.
     */
    function getAbout()
    {
        $sideListGenres = $this->model->getAllGenresDB();
        $this->view->showAbout($sideListGenres);
    }




    

    /**
     *  Muestra solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     * 
     */
    function getBooksByGenre($genre)
    {
        $sideListGenres = $this->model->getAllGenresDB();
        $booksByGenre = $this->model->getBooksByGenreDB($genre);
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
