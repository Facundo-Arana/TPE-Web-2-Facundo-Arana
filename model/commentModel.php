<?php
require_once('model/dbModel.php');

class commentModel extends dbModel
{
    function getCommentsDB($id)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM comment WHERE id_book_fk = ?');
        $response = $query->execute([$id]);
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

}