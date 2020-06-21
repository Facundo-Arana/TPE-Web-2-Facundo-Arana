<?php
require_once('model/dbModel.php');

class userModel extends dbModel
{
    public function getUserDB($name)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM user WHERE username = ?');
        $response = $query->execute([$name]);
        if ($response == true) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    public function newUser($name, $hash)
    {
        $query = $this->getDbConection()->prepare('INSERT INTO user (userName, password) VALUES (?,?)');
        $response = $query->execute([$name, $hash]);
        return $response;
    }
}
