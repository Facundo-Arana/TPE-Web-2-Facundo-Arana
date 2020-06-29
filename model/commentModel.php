<?php
require_once('model/dbModel.php');

class commentModel extends dbModel
{
    function getCommentsDB($id_book)
    {
        $query = $this->getDbConection()->prepare('SELECT comment.*, user.userName FROM comment, user WHERE id_book_fk = ? AND comment.id_user_fk = user.id_user');
        $response = $query->execute([$id_book]);
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

}