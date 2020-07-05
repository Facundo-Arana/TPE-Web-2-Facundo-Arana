<?php
require_once('model/dbModel.php');

class tokenModel extends dbModel
{

    function getTokenByUser($name)
    {
        $query = $this->getDbConection()->prepare('SELECT hash FROM token WHERE username = ?');
        $response = $query->execute([$name]);
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    public function deleteToken($name){
        $query = $this->getDbConection()->prepare('DELETE FROM token WHERE username = ?');
        $response = $query->execute([$name]);
        return $response;
    }

    public function setToken($hash, $user)
    {
        $query = $this->getDbConection()->prepare('INSERT INTO token (hash, username) VALUES (?, ?)');
        $response = $query->execute([$hash, $user]);
        return $response;
    }
}
