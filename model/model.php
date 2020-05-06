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
     *  Esta funcion retorna todos los libros de un genero especifico.
     *  El parametro recibido $genre es el nombre del genero de libros a buscar.
     * 
     *   //TODO  $reponse posibilidad de fallos en la db.
     */
    function getBooksByGenreDB($genre)
    { 
        /**
         * En esta sentencia se busca traer de la tabla 'literary_genre' el id que le corresponde al genero.
         */
        $query = $this->db->prepare('SELECT id_genre FROM literary_genre WHERE literary_genre.name = ?');
        $response = $query->execute([$genre]);
        $obj = $query->fetchAll(PDO::FETCH_OBJ);  //  var_dump($obj[0]->id_genre);die;    
          
        $id = $obj[0]->id_genre;

        /**
         * En esta sentencia se busca traer de la tabla 'catalogue' todos los libros del genero ya nombrado.
         */
        $query = $this->db->prepare('SELECT * FROM catalogue WHERE id_genre_fk = ?');
        $response = $query->execute([$id]);
        $booksByGenre = $query->fetchAll(PDO::FETCH_OBJ);

        return $booksByGenre;
    }
}
