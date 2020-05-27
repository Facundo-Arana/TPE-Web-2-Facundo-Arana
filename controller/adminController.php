<?php
require_once('controller/controller.php');

class adminController extends controller
{
    /** 
     *  Verificacion de los datos de registro del administrador.
     *  @param user sera falso si es que no existe un usuario con ese nombre en la base de datos.
     */
    public function verify($name, $pass)
    {
        if (empty($name) || empty($pass)) {
            $this->getLoginView()->showErrorLogin('completar todos los campos');
            die();
        }

        $userDB = $this->getUserModel()->getUserDB($name);
        // el nombre de administrador correcto es admin.
        if ($userDB == false) {
            $this->getLoginView()->showErrorLogin('nombre de usuario incorrecto');
            die();
        }

        $hash = $userDB[0]->adminPass;
        // la contraseña correcta es 1234. (en la db hay guardado un valor encriptado equivalente a 1234)
        $response = password_verify($pass, $hash);

        if ($response == false)
            $this->getLoginView()->showErrorLogin('contraseña incorrecta');
        else
            AuthHelper::login($userDB);
    }

    /** #Mostrar la vista del administrador solo si hay una sesion iniciada.
     * 
     *   En caso de no haber una sesion iniciada se mostrara un error en el login.
     */
    public function getAdminViews()
    {
        AuthHelper::checkLoggedIn();
        $books = $this->getBookModel()->getAllBooksDB();
        $genres = $this->getGenreModel()->getAllGenresDB();
        $this->getAdminView()->showAdminView($genres, $books);
    }

    /** #Añadir un nuevo genero a la base de datos.
     * 
     *  @param name es el nombre del genero (pasado por parametro) que el administrador quiere crear.
     *  @param existGenre sera true si es que ya se encuentra un genero con el mismo nombre en la base de datos.(lo que dispara un error)
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de crear un nuevo genero.
     */
    public function createNewGenre($name)
    {
        AuthHelper::checkLoggedIn();
        if ($name == '')
            $this->getErrorView()->showErrorView('Formulario vacio', 1);
        else {
            $existGenre = $this->getGenreModel()->getOneGenreDB($name);
            if ($existGenre == true)
                $this->getErrorView()->showErrorView('Genero ya existente', 1);
            else {
                $response = $this->getGenreModel()->newGenreDB($name);
                if ($response == false)
                    $this->getErrorView()->showErrorView('Error al añadir nuevo genero', 1);
                else
                    $this->getAdminView()->showAdminSuccess('Genero "' . $name . '" creado con exito');
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
    public function editGenre($newName, $idGenre)
    {
        AuthHelper::checkLoggedIn();
        if ($idGenre == '') {
            $this->getErrorView()->showErrorView('Seleccione un genero para editar', 1);
            die();
        }
        if (empty($newName)) {
            $this->getErrorView()->showErrorView('Escriba el nuevo nombre del genero', 1);
            die();
        }
        $existName = $this->getGenreModel()->getOneGenreDB($newName);
        if ($existName == true)
            $this->getErrorView()->showErrorView('El nombre es incorrecto. genero ya existente!', 1);
        else {
            $response = $this->getGenreModel()->editGenreDB($newName, $idGenre);
            if ($response == false)
                $this->getErrorView()->showErrorView('No se pudo editar el nombre del genero n°: ' . $idGenre, 1);
            else
                $this->getAdminView()->showAdminSuccess('Nombre del genero n°: ' . $idGenre . ' cambiado a: "' . $newName . '" con exito');
        }
    }

    /** #Eliminar un genero.
     * 
     *  @param idGenre es el id del genero saleccionado por el administrador para ser eliminado de los registros.
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de Eliminar un genero.
     */
    public function deleteGenre($idGenre)
    {
        AuthHelper::checkLoggedIn();
        if (empty($idGenre)) {
            $this->getErrorView()->showErrorView('Seleccione un genero para ser eliminado', 1);
            die();
        }
        $response = $this->getGenreModel()->deleteGenreDB($idGenre);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo eliminar el genero n°: ' . $idGenre, 1);
        else
            $this->getAdminView()->showAdminSuccess('Se ha eliminado el genero n°: ' . $idGenre . ' con exito');
    }

    /** #añadir un nuevo libro.
     * 
     * @param params son los datos enviadosp x metodo POST
     */
    public function addBook($params)
    {
        AuthHelper::checkLoggedIn();
        $name = $params['name'];
        $author = $params['author'];
        $details = $params['details'];
        $idGenreFk = $params['idGenreFK'];
        if (empty($name) || empty($author) || empty($idGenreFk) || empty($details)) {
            $this->getErrorView()->showErrorView('completar todos los campos', 1);
            die();
        }
        $response = $this->getBookModel()->addBookDB($name, $author, $details, $idGenreFk);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo añadir el libro: ' . $name, 1);
        else
            $this->getAdminView()->showAdminSuccess('Se ha añadido el libro: ' . $name . ' con exito');
    }

    /** #editar un libro ya existente.
     * 
     * @param params son los datos enviados x metodo POST.s
     */
    public function editBook($params)
    {
        AuthHelper::checkLoggedIn();
        $name = $params['newName'];
        $author = $params['newAuthorName'];
        $details = $params['details'];
        $idBook = $params['idBook'];
        $idGenreFk = $params['idGenreFk'];
        if (empty($name) || empty($author) || empty($idBook) || empty($details) || empty($idGenreFk)) {
            $this->getErrorView()->showErrorView('completar todos los campos', 1);
            die();
        }
        $response = $this->getBookModel()->editBookDB($name, $author, $details, $idGenreFk, $idBook);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo editar el libro :' . $name . '', 1);
        else
            $this->getAdminView()->showAdminSuccess('Se ha editado el libro: ' . $name . ' con exito');
    }

    /** #eliminar un libro.
     * 
     * @param idBook es el id del libro que se quiere eliminar.
     */
    public function deleteBook($idBook)
    {
        AuthHelper::checkLoggedIn();
        $response = $this->getBookModel()->deleteBookDB($idBook);
        if ($response == false)
            $this->getErrorView()->showErrorView('No se pudo eliminar el libro: ' . $idBook . '', 1);
        else
            $this->getAdminView()->showAdminSuccess('Se ha elimiado el libro:' . $idBook . ' con exito');
    }


    /** 
     * Cerrar una sesion y borrar las variables.
     */
    public function logOut()
    {
        AuthHelper::logout();
    }

}
