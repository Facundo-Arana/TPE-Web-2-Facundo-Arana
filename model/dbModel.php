<?php

class dbModel
{
    private $db;
    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;' . 'dbname=biblioteca_virtual;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $c) {
            var_dump($c);
        }
    }

    public function getDbConection()
    {
        return $this->db;
    }
}
