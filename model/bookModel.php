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
     *  Retorna un arreglo con todos los libros de la db.
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
     *  Retorna todos los libros de un genero especifico.
     *  El parametro recibido $genre es el nombre del genero de libros a buscar.
     * 
     */
    public function getBooksByGenreDB($genre)
    {
        $query = $this->db->prepare('SELECT book.*, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id WHERE genre.name = ? ');
        $response = $query->execute([$genre]);

        if ($response == true) 
            return  $query->fetchAll(PDO::FETCH_OBJ);

        else {
            return $response;
        }
    }


    /**
     *  Retorna un libro especifico incluido el nombre de su genero.
     * 
     */
    public function getBookDetailsDB($id)
    {
        $query = $this->db->prepare('SELECT * FROM book WHERE book.id = ?');
        $response = $query->execute([$id]);
        
        if ($response == true) 
            return  $query->fetchAll(PDO::FETCH_OBJ);

        else {
            return $response;
        }
    }

}
