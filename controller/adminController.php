<?php
require_once('controller/controller.php');

class adminController extends controller
{
    private $username;
    function __construct()
    {
        parent::__construct();
        $this->username = AuthHelper::getUserName();
    }
    /**
     *  Mostrar la vista del administrador solo si hay una sesion iniciada.
     */
    public function getAdminViews()
    {
        AuthHelper::authorityCheck();
        $books = $this->getBookModel()->getAllBooksDB();
        $genres = $this->getGenreModel()->getAllGenresDB();
        $this->getAdminView()->showAdminView($genres, $books, $this->username);
    }

    /** #Añadir un nuevo genero a la base de datos.
     * 
     *  @param existGenre sera true si es que ya se encuentra un genero con el mismo nombre en la base de datos.(lo que dispara un error)
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de crear un nuevo genero.
     */
    public function createNewGenre()
    {
        AuthHelper::authorityCheck();
        $name = $_POST['nameGenre'];
        if ($name == '')
            $this->getErrorView()->showErrorView('Formulario vacio', 1);
        else {
            $existGenre = $this->getGenreModel()->getOneGenreDB($name);
            if ($existGenre == true)
                $this->getErrorView()->showErrorView('Genero ya existente', 1, $this->username);
            else {
                $response = $this->getGenreModel()->newGenreDB($name);
                if ($response == false)
                    $this->getErrorView()->showErrorView('Error al añadir nuevo genero', 1, $this->username);
                else
                    $this->getAdminView()->showAdminSuccess('Genero "' . $name . '" creado con exito', $this->username);
            }
        }
    }

    /** #Editar el nombre de un genero ya existente.
     *  
     *  @param newName es el nuevo nombre que se quiere asignar a un genero seleccionado. 
     *  @param idGenre es el id que le corresponde al genero seleccionado por el usuario para ser editado.
     *  @param existName sera true si es que ya existe un genero con el mismo nombre que $newName. (lo que dispara un error).
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de Editar un genero.
     */
    public function editGenre()
    {
        AuthHelper::authorityCheck();
        $newName =    $_POST['newName'];
        $idGenre = $_POST['idGenre'];
        if ($idGenre == '') {
            $this->getErrorView()->showErrorView('Seleccione un genero para editar', 1, $this->username);
            die();
        }
        if (empty($newName)) {
            $this->getErrorView()->showErrorView('Escriba el nuevo nombre del genero', 1, $this->username);
            die();
        }
        $existName = $this->getGenreModel()->getOneGenreDB($newName);
        if ($existName == true)
            $this->getErrorView()->showErrorView('El nombre es incorrecto. genero ya existente!', 1, $this->username);
        else {
            $response = $this->getGenreModel()->editGenreDB($newName, $idGenre);
            if ($response == false)
                $this->getErrorView()->showErrorView('No se pudo editar el nombre del genero n°: ' . $idGenre, 1, $this->username);
            else
                $this->getAdminView()->showAdminSuccess('Nombre del genero n°: ' . $idGenre . ' cambiado a: "' . $newName . '" con exito', $this->username);
        }
    }

    /** #Eliminar un genero.
     * 
     *  @param idGenre es el id del genero saleccionado por el administrador para ser eliminado de los registros.
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de Eliminar un genero.
     */
    public function deleteGenre()
    {
        AuthHelper::authorityCheck();
        $idGenre = $_POST['idGenre'];
        if (empty($idGenre)) {
            $this->getErrorView()->showErrorView('Seleccione un genero para ser eliminado', 1, $this->username);
            die();
        }
        $response = $this->getGenreModel()->deleteGenreDB($idGenre);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo eliminar el genero n°: ' . $idGenre, 1, $this->username);
        else
            $this->getAdminView()->showAdminSuccess('Se ha eliminado el genero n°: ' . $idGenre . ' con exito', $this->username);
    }

    /**
     *  Añadir un nuevo libro.
     */
    public function addBook()
    {
        AuthHelper::authorityCheck();
        $name = $_POST['name'];
        $author = $_POST['author'];
        $details = $_POST['details'];
        $idGenreFk = $_POST['idGenreFK'];
        if (empty($name) || empty($author) || empty($idGenreFk) || empty($details)) {
            $this->getErrorView()->showErrorView('completar todos los campos', 1, $this->username);
            die();
        }
        if (
            $_FILES['img_name']['type'] == "image/jpg" ||
            $_FILES['img_name']['type'] == "image/jpeg" ||
            $_FILES['img_name']['type'] == "image/png"
        ) {
            $response = $this->getBookModel()->addBookDB($name, $author, $details, $idGenreFk, $_FILES['img_name']['tmp_name']);
        } else
            $response = $this->getBookModel()->addBookDB($name, $author, $details, $idGenreFk);

        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo añadir el libro: ' . $name, 1, $this->username);
        else
            $this->getAdminView()->showAdminSuccess('Se ha añadido el libro: ' . $name . ' con exito', $this->username);
    }

    /** 
     * Editar un libro ya existente.
     */
    public function editBook()
    {
        AuthHelper::authorityCheck();
        $name = $_POST['newName'];
        $author = $_POST['newAuthorName'];
        $details = $_POST['details'];
        $idBook = $_POST['idBook'];
        $idGenreFk = $_POST['idGenreFk'];
        if (empty($name) || empty($author) || empty($idBook) || empty($details) || empty($idGenreFk)) {
            $this->getErrorView()->showErrorView('completar todos los campos', 1);
            die();
        }
        $response = $this->getBookModel()->editBookDB($name, $author, $details, $idGenreFk, $idBook);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo editar el libro :' . $name . '', 1, $this->username);
        else
            $this->getAdminView()->showAdminSuccess('Se ha editado el libro: ' . $name . ' con exito', $this->username);
    }

    /**
     *  Eliminar un libro.
     */
    public function deleteBook()
    {
        AuthHelper::authorityCheck();
        $idBook = $_POST['idBook'];
        $response = $this->getBookModel()->deleteBookDB($idBook);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo eliminar el libro: ' . $idBook . '', 1, $this->username);
        else
            $this->getAdminView()->showAdminSuccess('Se ha elimiado el libro:' . $idBook . ' con exito', $this->username);
    }


    /** 
     * Cerrar una sesion y borrar las variables.
     */
    public function logOut()
    {
        AuthHelper::logout();
    }
}
