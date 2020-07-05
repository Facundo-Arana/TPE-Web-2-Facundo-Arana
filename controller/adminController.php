<?php
require_once('controller/controller.php');

class adminController extends controller
{
    /**
     *  Contiene todos los datos del usuario actualmente logueado.
     */
    private $userData;

    function __construct()
    {
        parent::__construct();
        $this->userData = AuthHelper::getUserData();
    }

    /**
     *  Mostrar la vista del administrador solo si hay una sesion iniciada.
     */
    public function getAdminViews()
    {
        AuthHelper::authorityCheck();
        $books = $this->getBookModel()->getAllBooksDB();
        $genres = $this->getGenreModel()->getAllGenresDB();
        $users = $this->getUserModel()->getAllUsersWithoutAdmin($this->userData['id']);
        $this->getAdminView()->showAdminView($genres, $books, $this->userData, $users);
    }

    /**
     * Editar portada de un libro. tambien borrar.
     */
    public function editCover()
    {
        AuthHelper::authorityCheck();
        $id = $_POST['id_book_cover'];

        $link_img = $_POST['link_img'];
        if ($_POST['submitCover'] == 'Delete Cover') {
            $this->getBookModel()->editCover($id);
            unlink($link_img);
            $this->getAdminView()->showAdminSuccess('Se eliminado la portada con exito', $this->userData);
            die();
        }

        if (
            $_FILES['cover']['type'] == "image/jpg" || $_FILES['cover']['type'] == "image/jpeg" ||
            $_FILES['cover']['type'] == "image/png"
        ) {
            $response = $this->getBookModel()->editCover($id, $_FILES['cover']['tmp_name'], $_FILES['cover']['name']);
            if ($response == false)
                $this->getErrorView()->showErrorView('Error al añadir imagen', $this->userData);
            else {
                if ($link_img) {
                    $this->getAdminView()->showAdminSuccess('Se editado la portada con exito', $this->userData);
                    unlink($link_img);
                } else
                    $this->getAdminView()->showAdminSuccess('Se añadido la portada con exito', $this->userData);
            }
        } else {
            $this->getErrorView()->showErrorView('Formato de imagen incorrecto', $this->userData);
        }
    }

    /**
     *  Modificar los permisos de un usuario 
     */
    public function editPermissions()
    {
        AuthHelper::authorityCheck();
        $id = $_POST['idUser'];
        $priority = $_POST['priority'];
        if ((empty($id)) || (empty($priority))) {
            $this->getErrorView()->showErrorView('Completar todos los campos', $this->userData);
            die();
        }
        $result = $this->getUserModel()->editPriority(intval($priority), $id);
        if ($result == false)
            $this->getErrorView()->showErrorView('Error al editar permisos', $this->userData);
        else
            $this->getAdminView()->showAdminSuccess('Permisos del usuario "' . $id . '" editados con exito', $this->userData);
    }

    /**
     * Eliminar un usuario.
     */
    public function deleteUser()
    {
        AuthHelper::authorityCheck();
        $id = $_POST['idUser'];
        if (empty($id)) {
            $this->getErrorView()->showErrorView('Completar todos los campos', $this->userData);
            die();
        }
        $result = $this->getUserModel()->deleteUser($id);
        if ($result == false)
            $this->getErrorView()->showErrorView('Error al eliminar usuario', $this->userData);
        else
            $this->getAdminView()->showAdminSuccess('Usuario "' . $id . '" eliminado con exito', $this->userData);
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
            $this->getErrorView()->showErrorView('Formulario vacio', $this->userData);
        else {
            $existGenre = $this->getGenreModel()->getOneGenreDB($name);
            if ($existGenre == true)
                $this->getErrorView()->showErrorView('Genero ya existente', $this->userData);
            else {
                $response = $this->getGenreModel()->newGenreDB($name);
                if ($response == false)
                    $this->getErrorView()->showErrorView('Error al añadir nuevo genero', $this->userData);
                else
                    $this->getAdminView()->showAdminSuccess('Genero "' . $name . '" creado con exito', $this->userData);
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
            $this->getErrorView()->showErrorView('Seleccione un genero para editar', $this->userData);
            die();
        }
        if (empty($newName)) {
            $this->getErrorView()->showErrorView('Escriba el nuevo nombre del genero', $this->userData);
            die();
        }
        $existName = $this->getGenreModel()->getOneGenreDB($newName);
        if ($existName == true)
            $this->getErrorView()->showErrorView('El nombre es incorrecto. genero ya existente!', $this->userData);
        else {
            $response = $this->getGenreModel()->editGenreDB($newName, $idGenre);
            if ($response == false)
                $this->getErrorView()->showErrorView('No se pudo editar el nombre del genero n°: ' . $idGenre, $this->userData);
            else
                $this->getAdminView()->showAdminSuccess('Nombre del genero n°: ' . $idGenre . ' cambiado a: "' . $newName . '" con exito', $this->userData);
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
            $this->getErrorView()->showErrorView('Seleccione un genero para ser eliminado', $this->userData);
            die();
        }
        $response = $this->getGenreModel()->deleteGenreDB($idGenre);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo eliminar el genero n°: ' . $idGenre, $this->userData);
        else
            $this->getAdminView()->showAdminSuccess('Se ha eliminado el genero n°: ' . $idGenre . ' con exito', $this->userData);
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
            $this->getErrorView()->showErrorView('completar todos los campos', $this->userData);
            die();
        }
        if (
            $_FILES['img_name']['type'] == "image/jpg" || $_FILES['img_name']['type'] == "image/jpeg" ||
            $_FILES['img_name']['type'] == "image/png"
        ) {
            $response = $this->getBookModel()->addBookDB($name, $author, $details, $idGenreFk, $_FILES['img_name']['tmp_name'], $_FILES['img_name']['name']);
        } else
            $response = $this->getBookModel()->addBookDB($name, $author, $details, $idGenreFk);

        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo añadir el libro: ' . $name, $this->userData);
        else
            $this->getAdminView()->showAdminSuccess('Se ha añadido el libro: ' . $name . ' con exito', $this->userData);
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

        //var_dump($idBook);die;
        if (empty($name) || empty($author) || empty($idBook) || empty($details) || empty($idGenreFk)) {
            $this->getErrorView()->showErrorView('completar todos los campos', $this->userData);
            die();
        }
        $response = $this->getBookModel()->editBookDB($name, $author, $details, $idGenreFk, $idBook);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo editar el libro :' . $name . '', $this->userData);
        else
            $this->getAdminView()->showAdminSuccess('Se ha editado el libro: ' . $name . ' con exito', $this->userData);
    }

    /**
     *  Eliminar un libro.
     */
    public function deleteBook()
    {
        AuthHelper::authorityCheck();
        $idBook = $_POST['idBook'];
        $response = $this->getBookModel()->deleteBookDB($idBook);
        if ($response == false) {

            $this->getErrorView()->showErrorView('No se pudo eliminar el libro: ' . $idBook . '', $this->userData);
        } else {
            $this->getAdminView()->showAdminSuccess('Se ha elimiado el libro:' . $idBook . ' con exito', $this->userData);
            die();
        }
    }

    /** 
     * Cerrar una sesion y borrar las variables.
     */
    public function logOut()
    {
        AuthHelper::logout();
    }
}
