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
        $query = $this->db->prepare('SELECT * FROM genre');
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
        $query = $this->db->prepare('SELECT * FROM book');
        $query->execute();
  
        return $query->fetchAll(PDO::FETCH_OBJ);

    }

    /**
     *  Esta funcion retorna todos los libros de un genero especifico.
     *  El parametro recibido $genre es el nombre del genero de libros a buscar.
     * 
     */
    function getBooksByGenreDB($name)
    { 
        //ciencia-ficcion
        $split = explode("-", $name);
        
        if(isset($split[1]))
            $genre = $split[0] . ' ' . $split[1];
        else
            $genre = $split[0];

        $query = $this->db->prepare('SELECT book.*, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id_genre WHERE genre.name = ? ');

        $query->execute([$genre]);
        $booksByGenre = $query->fetchAll(PDO::FETCH_OBJ);
        return $booksByGenre;
    }
}
