<?php
include_once('view/adminView.php');
include_once('model/bookModel.php');
include_once('model/genreModel.php');


class adminController
{
    private $genreModel;
    private $bookModel;
    private $view;

    function __construct()
    {
        $this->view = new adminView();
        $this->genreModel = new genreModel();
        $this->bookModel = new bookModel();
        $this->userModel = new userModel();
    }

    /** #Añadir un nuevo genero a la base de datos.
     * 
     *  @param name es el nombre del genero (pasado por parametro) que el administrador quiere crear.
     *  @param existGenre sera true si es que ya se encuentra un genero con el mismo nombre en la base de datos.(lo que dispara un error)
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de crear un nuevo genero.
     */
    public function createNewGenre($name)
    {
        if ($name == '')
            $this->view->showErrorAdmin('Formulario vacio');
        else {
            $existGenre = $this->genreModel->getOneGenreDB($name);
            if ($existGenre == true)
                $this->view->showErrorAdmin('Genero ya existente');
            else {
                $response = $this->genreModel->newGenreDB($name);
                if ($response == false)
                    $this->view->showErrorAdmin('Error al añadir nuevo genero');
                else
                    $this->view->showAdminSuccess('Genero "' . $name . '" creado con exito');
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
        if ($idGenre == '') {
            $this->view->showErrorAdmin('Seleccione un genero para editar');
            die();
        }
        if (empty($newName)) {
            $this->view->showErrorAdmin('Escriba el nuevo nombre del genero');
            die();
        }
        $existName = $this->genreModel->getOneGenreDB($newName);
        if ($existName == true)
            $this->view->showErrorAdmin('El nombre es incorrecto. genero ya existente!');
        else {
            $response = $this->genreModel->editGenreDB($newName, $idGenre);
            if ($response == false)
                $this->view->showErrorAdmin('No se pudo editar el nombre del genero n°:' . $idGenre .'');
            else
                $this->view->showAdminSuccess('Nombre del genero n°:' . $idGenre . ' cambiado a: "' . $newName . '" con exito');
        }
    }

    /** #Eliminar un genero.
     * 
     *  @param idGenre es el id del genero saleccionado por el administrador para ser eliminado de los registros.
     *  @param response sera true o false dependiendo del exito o fracaso de la operacion de Eliminar un genero.
     */
    public function deleteGenre($idGenre)
    {
        if (empty($idGenre)) {
            $this->view->showErrorAdmin('Seleccione un genero para ser eliminado');
            die();
        }
        $response = $this->genreModel->deleteGenreDB($idGenre);
        if ($response == false)
            $this->view->showErrorAdmin('No se pudo eliminar el genero n°:' . $idGenre . '');
        else
            $this->view->showAdminSuccess('Se ha eliminado el genero n°:'. $idGenre .' con exito');
    }

    /** #Mensaje de error cuando ingresa un parametro incorrecto en el router.
     * 
     *  @param mensagge es el error puntal que ha ocurrido y que se quiere informar.
     */
    public function routerError($mensagge)
    {
        $this->view->showErrorLogin($mensagge);
    }
}
