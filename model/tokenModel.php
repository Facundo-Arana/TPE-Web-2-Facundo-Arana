<?php
require_once('model/dbModel.php');

class tokenModel extends dbModel
{

    function getToken($id)
    {
        $query = $this->getDbConection()->prepare('SELECT hash FROM token WHERE id_user_fk = ?');
        $response = $query->execute([$id]);
        if ($response == true)
            return $query->fetch(PDO::FETCH_OBJ);
        else
            return $response;
    }

    public function deleteToken($id){
        $query = $this->getDbConection()->prepare('DELETE FROM token WHERE id_user_fk = ?');
        $response = $query->execute([$id]); 
        return $response;
    }

    public function setToken($hash, $id)
    {
        $query = $this->getDbConection()->prepare('INSERT INTO token (hash, id_user_fk) VALUES (?, ?)');
        $response = $query->execute([$hash, $id]);
        return $response;
    }
}
