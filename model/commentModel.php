<?php
require_once('model/dbModel.php');

class commentModel extends dbModel
{

    public function newComment($id_book, $id_user, $content, $puntaje){
        $query = $this->getDbConection()->prepare('INSERT INTO comment (id, id_book_fk, id_user_fk, content, puntaje) VALUES (null, ?, ?, ?, ?)');
        $response = $query->execute([$id_book, $id_user, $content, $puntaje]);
        return $response;
    }

    public function deleteComment($id)
    {
        $query = $this->getDbConection()->prepare('DELETE FROM comment WHERE id = ?');
        $response = $query->execute([$id]);
        return $response;
    }

    public function searchComment($id)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM comment WHERE id = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBookComments($id_book)
    {
        $query = $this->getDbConection()->prepare('SELECT comment.*, user.userName FROM comment, user WHERE id_book_fk = ? AND comment.id_user_fk = user.id_user');
        $response = $query->execute([$id_book]);
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }
}
