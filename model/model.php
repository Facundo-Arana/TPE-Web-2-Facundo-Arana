<?php

class catalogue
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
     * 
     */
    function getAllGenresDB()
    {
        $query = $this->db->prepare('SELECT * FROM literary_genre');
        $respuesta = $query->execute();
        if ($respuesta == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return NULL;
    }



    /**
     *  Retorna un arreglo con todos los datos de la tabla 'catalogue' de la db.
     * 
     * 
     */
    function getAllBooksDB()
    {
        $query = $this->db->prepare('SELECT * FROM catalogue');
        $respuesta = $query->execute();
        if ($respuesta == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return NULL;
    }

    /**
     *  Retorna un arreglo con todos los libros de un genero especifico.
     * //TODO
     * 
     */
    function getBooksByGenre($genre)
    {
        $query = $this->db->prepare('SELECT catalogue.*, literary_genre.name as literary_genre FROM catalogue JOIN literary_genre ON catalogue.id_genre_fk = literary_genre.id_genre');
        $respuesta = $query->execute([$genre]);
        if ($respuesta == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return NULL;

    }
}
