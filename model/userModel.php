<?php
require_once('model/dbModel.php');

class userModel extends dbModel
{  
    public function getUserDB($name){
        $query = $this->getDbConection()->prepare('SELECT * FROM user WHERE username = ?');
        $response = $query->execute([$name]);
        if($response == true){
            return $query->fetchAll(PDO::FETCH_OBJ);
        }else{
            return $response;
        }
    }

}
