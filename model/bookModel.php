<?php
require_once('model/dbModel.php');

class bookModel extends dbModel
{
    /** 
     *  Obtener todos los registros de la tabla 'book' de la base de datos.
     *  
     */
    public function getAllBooksDB()
    {
        $query = $this->getDbConection()->prepare('SELECT *, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id ORDER BY book_name ASC');
        $response = $query->execute();
        if ($response == true)
            return $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** #Obtener todos los registros de libros de un genero especifico.
     * 
     *  @param genre el el nombre del genero que se busca encontrar.
     */
    public function getBooksByGenreDB($genre)
    {
        $query = $this->getDbConection()->prepare('SELECT book.*, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id WHERE genre.name = ?');
        $response = $query->execute([$genre]);
        if ($response == true)
            return  $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** 
     *  Obtener un elemento de la tabla 'book' de la base de datos.
     */
    public function getBookDetailsDB($id)
    {
        $query = $this->getDbConection()->prepare('SELECT * FROM book WHERE book.book_id = ?');
        $response = $query->execute([$id]);
        if ($response == true)
            return  $query->fetch(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** 
     * añadir un nuevo libro a los registros.
     */
    public function addBookDB($name, $author, $details, $idGenreFK, $img = null, $imgname=null)
    {
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img,$imgname);

        $query = $this->getDbConection()->prepare('INSERT INTO book (book_id, book_name, author, details, id_genre_fk, img) VALUES (NULL, ?, ?, ?, ?, ?)');
        $response = $query->execute([$name, $author, $details, $idGenreFK, $pathImg]);
        return $response;
    }

    /**
     *  Editar / eliminar una portada.
     */
    public function editCover($id, $img = null, $name = null)
    {
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img, $name);

        $query = $this->getDbConection()->prepare('UPDATE book SET img = ? WHERE book_id = ?');
        return $query->execute([$pathImg, $id]);
    }

    private function uploadImage($img, $name)
    {
        $target = 'covers/' . uniqid() . '.' . strtolower(pathinfo($name, PATHINFO_EXTENSION));
        move_uploaded_file($img, $target);
        return $target;
    }

    /** 
     * editar un libro.
     */
    public function editBookDB($name, $author, $details, $idGenreFk, $idBook)
    {
        $query = $this->getDbConection()->prepare('UPDATE book SET book_name = ? , author = ? , details = ?, id_genre_fk = ? WHERE book_id = ?');
        $response = $query->execute([$name, $author, $details, $idGenreFk, $idBook]);
        return $response;
    }

    /** 
     *  @param id el el id del libro a borrar.
     */
    public function deleteBookDB($id)
    {
        $query = $this->getDbConection()->prepare('DELETE FROM book WHERE book_id = ?');
        $response = $query->execute([$id]);
        return $response;
    }
}
