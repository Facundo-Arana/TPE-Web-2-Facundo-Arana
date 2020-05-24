<?php
require_once('model/dbModel.php');

class genreModel extends dbModel
{
    /** #Obtener todos los datos registrados en la tabla 'genre' de la base de datos.
     * 
     *  @param query es la sentencia SQL que se quiere ejecutar.
     *  @param response sera falso si es que no se halla nada en los registros.
     *  @return PDO 'objeto de datos PHP' con los registros de la base de datos.
     */
    function getAllGenresDB()
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM genre');
        $response = $query->execute();
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** #Obtener los datos de un elemento de la tabla 'genre' de la base de datos.
     * 
     *  @param name es el nombre del genero que se quiero obtener.
     *  @param query es la sentencia SQL que se quiere ejecutar.
     *  @param response sera falso si es que no se halla nada en los registros.
     *  @return PDO 'objeto de datos PHP' con los registros de la base de datos.
     */
    function getOneGenreDB($name)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM genre WHERE genre.name = ?');
        $response = $query->execute([$name]);
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** #Añade un nuevo genero a la tabla 'genre' en la base de datos.
     * 
     *  @param genre es el nombre del genero que se quiere añadir a la base de datos.
     *  @param query es la sentencia SQL que se quiere ejecutar.
     *  @return response sera falso si es que no se ejecuto correctamente la sentencia.
     */
    public function newGenreDB($genre)
    {
        $query = $this->getDbConection()->prepare('INSERT INTO genre (id, name) VALUES (NULL, ?)');
        $response = $query->execute([$genre]);
        return $response;
    }

    /** #Edita el nombre de un genero en la base de datos.
     * 
     *  @param newName es el nombre nuevo que se le quiere asignar a un genero ya existente en la base de datos.
     *  @param id es el identificador del elemento que se quiere editar.
     *  @param query es la sentencia SQL que se quiere ejecutar.
     *  @return response sera falso si es que no se ejecuto correctamente la sentencia.
     */
    public function editGenreDB($newName, $id)
    {
        $query = $this->getDbConection()->prepare('UPDATE genre SET name = ? WHERE id = ?');
        $response = $query->execute([$newName, $id]);
        return $response;
    }

    /** #Elimina un genero de la base de datos.
     * 
     *  @param idGenre es el identificador del genero que fue selecionado para ser borrado de los registros.
     *  @param query es la sentencia SQL que se quiere ejecutar.
     *  @return response sera falso si es que no se ejecuto correctamente la sentencia.
     */
    public function deleteGenreDB($idGenre){
        $query = $this->getDbConection()->prepare('DELETE FROM genre WHERE id = ?');
        $response = $query->execute([$idGenre]);
        return $response;
    }
}
