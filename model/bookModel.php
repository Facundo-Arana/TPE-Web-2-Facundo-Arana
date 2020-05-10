<?php

class bookModel
{
    private $db;

    function __construct()
    {
        try {

            $this->db = new PDO('mysql:host=localhost;' . 'dbname=biblioteca_virtual;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $c){
            var_dump($c);
        }
        
    }



    /**
     *  Retorna un arreglo con todos los datos de la tabla 'catalogue' de la db.
     *  //TODO hacer un boton para esto.
     * 
     */
    public function getAllBooksDB()
    {
        $query = $this->db->prepare('SELECT * FROM book');
        $response = $query->execute();

        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);

        else
            return $response;
    }




    /**
     *  Esta funcion retorna todos los libros de un genero especifico.
     *  El parametro recibido $genre es el nombre del genero de libros a buscar.
     * 
     */
    public function getBooksByGenreDB($name)
    {
        //ciencia-ficcion
        $split = explode("-", $name);

        if (!isset($split[1]))
            $genre = $split[0];
        elseif (!isset($split[2]))
            $genre = $split[0] . ' ' . $split[1];
        elseif (!isset($split[3]))
            $genre = $split[0] . ' ' . $split[1] . ' ' . $split[2];
        else {
            $genre = $split[0] . ' ' . $split[1] . ' ' . $split[2] . ' ' . $split[3];
        }


        $query = $this->db->prepare('SELECT book.*, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id WHERE genre.name = ? ');
        $reponse = $query->execute([$genre]);

        if ($reponse == true) 
            return  $query->fetchAll(PDO::FETCH_OBJ);

        else {
            return $reponse;
        }
    }
}
