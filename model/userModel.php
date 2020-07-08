<?php
require_once('model/dbModel.php');

class userModel extends dbModel
{

    /**
     *  Cambiar contraseña de usuario.
     */
    public function setPassword($id, $hash)
    {
        $query = $this->getDbConection()->prepare('UPDATE user SET password = ? WHERE id_user = ?');
        return $query->execute([$hash, $id]);
    }

    /**
     * 
     */
    public function checkPass($username, $old, $new){
        $data = $this->getUserByName($username);
        $response = password_verify($old, $data->password);
        if($response == false)
            return false;
        else{
            $encryptedPass = password_hash($new, PASSWORD_DEFAULT);
            $ok = $this->setPassword($data->id_user, $encryptedPass);
            
            if(!$ok)
                return false;
            else
                return true;
        }
    }

    /**
     *  Traer un usuario por su nombre.
     */
    public function getUserByName($name)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM user WHERE username = ?');
        $response = $query->execute([$name]);
        if ($response == true) {
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    /**
     *  Traer el id y el mail de un usuario.
     */
    public function getIdUser($name)
    {
        $query = $this->getDbConection()->prepare('SELECT id_user, email FROM user WHERE username = ?');
        $response = $query->execute([$name]);
        if ($response == true) {
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }
    /**
     *  Traer un usuario por su id.
     */
    public function getUserById($id)
    {
        $query = $this->getDbConection()->prepare('SELECT id_user, userName, email, priority FROM user WHERE id_user = ?');
        $response = $query->execute([$id]);
        if ($response == true) {
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return $response;
        }
    }

    /**
     *  Traer todos los usuarios excepto el usuario logueado actualmente (solo un administrador puede llamar a esta funcion).
     */
    public function getAllUsersWithoutAdmin($id)
    {
        $query = $this->getDbConection()->prepare('SELECT id_user, userName, email, priority FROM user WHERE id_user != ?');
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
