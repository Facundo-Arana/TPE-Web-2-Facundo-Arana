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

    public function getUserById($id)
    {
        $query = $this->getDbConection()->prepare('SELECT id_user, userName, priority FROM user WHERE id_user = ?');
        $response = $query->execute([$id]);
        if ($response == true) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    public function getAllUsers()
    {
        $query = $this->getDbConection()->prepare('SELECT id_user, userName, priority FROM user');
        $response = $query->execute([]);
        if ($response == true) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    public function deleteUser($id){
        $query = $this->getDbConection()->prepare('DELETE FROM user WHERE id_user = ?');
        $response = $query->execute([$id]);
        return $response;
    }

    public function editPriority($priority, $id)
    {
        $query = $this->getDbConection()->prepare('UPDATE user SET priority = ? WHERE id_user = ?');
        $response = $query->execute([$priority, $id]);
        return $response;
    }

    public function newUser($name, $hash, $email)
    {
        $query = $this->getDbConection()->prepare('INSERT INTO user (userName, email, password) VALUES (?,?,?)');
        $response = $query->execute([$name, $email, $hash]);
        return $response;
    }
}
