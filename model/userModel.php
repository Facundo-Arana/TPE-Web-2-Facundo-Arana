
<?php


class userModel
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
    
    public function getUserDB($name){
        $query = $this->db->prepare('SELECT * FROM login WHERE username = ?');
        $response = $query->execute([$name]);
        if($response == true){
            return $query->fetchAll(PDO::FETCH_OBJ);
        }else{
            return $response;
        }
    }




}
