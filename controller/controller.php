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
     *  Muestra solo libros de un genero especifico.
     *  $genre es el genero de libro que se quiere buscar.
     * 
     */
    public function getBooksByGenre($genre)
    {
        $listGenres = $this->genreModel->getAllGenresDB();
        $booksByGenre = $this->bookModel->getBooksByGenreDB($genre);

        //var_dump($booksByGenre);die;
        if (empty($booksByGenre))
            $this->showError('aun no hay registrados libros del genero ' . $genre . '');

        elseif ($booksByGenre == false)
            $this->showError('ocurrio un error durante la busqueda');

        else {
            
            $this->view->showBooksByGenre($listGenres, $booksByGenre);
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
