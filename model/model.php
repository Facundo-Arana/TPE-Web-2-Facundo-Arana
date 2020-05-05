<?php

class library
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

    function getAllGenres(){
        $query = $this->db->prepare('SELECT * FROM literary_genre');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

   
}
