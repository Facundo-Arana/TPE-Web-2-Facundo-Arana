<?php
require_once('model/dbModel.php');

class userModel extends dbModel
{

    /**
     *  Traer un usuario por su nombre.
     */
    public function getUserByName($name)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM user WHERE username = ?');
        $response = $query->execute([$name]);
        if ($response == true) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    /**
     *  
     */
    public function getUsername($name){
        $query = $this->getDbConection()->prepare('SELECT username, email FROM user WHERE username = ?');
        $response = $query->execute([$name]);
        if ($response == true) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }
    /**
     *  Traer un usuario por su id.
     */
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

    /**
     *  Traer todos los usuarios excepto el usuario logueado actualmente (solo un administrador puede llamar a esta funcion).
     */
    public function getAllUsersWithoutAdmin($id)
    {
        $query = $this->getDbConection()->prepare('SELECT id_user, userName, priority FROM user WHERE id_user != ?');
        $response = $query->execute([$id]);
        if ($response == true) {
            return $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    /**
     *  Borrar un usuario de la db.
     */
    public function deleteUser($id)
    {
        $query = $this->getDbConection()->prepare('DELETE FROM user WHERE id_user = ?');
        $response = $query->execute([$id]);
        return $response;
    }

    /**
     *  Editar los permisos de un usuario.
     */
    public function editPriority($priority, $id)
    {
        $query = $this->getDbConection()->prepare('UPDATE user SET priority = ? WHERE id_user = ?');
        $response = $query->execute([$priority, $id]);
        return $response;
    }

    /**
     *  Registrar un nuevo usuario.
     */
    public function newUser($name, $hash, $email)
    {
        $query = $this->getDbConection()->prepare('INSERT INTO user (userName, email, password) VALUES (?,?,?)');
        $response = $query->execute([$name, $email, $hash]);
        return $response;
    }
}
