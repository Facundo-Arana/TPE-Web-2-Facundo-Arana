<?php


class genreModel
{
    private $db;

    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;' . 'dbname=biblioteca_virtual;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $c) {
            echo ($c);
        }
    }


    /**
     *  Retorna un arreglo con todos los datos de la tabla 'literary_genre' de la db.
     * 
     */
    function getAllGenresDB()
    {
        $query = $this->db->prepare('SELECT * FROM genre');
        $response = $query->execute();

        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }
}
