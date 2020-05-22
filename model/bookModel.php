<?php

class bookModel
{
    private $db;

    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;' . 'dbname=biblioteca_virtual;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $c) {
            var_dump($c);
        }
    }

    /** #Obtener todos los registros de la tabla 'book' de la base de datos.
     *  
     */
    public function getAllBooksDB()
    {
        $query = $this->db->prepare('SELECT *, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id');
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
        $query = $this->db->prepare('SELECT book.*, genre.name as genre FROM book JOIN genre ON book.id_genre_fk = genre.id WHERE genre.name = ? ');
        $response = $query->execute([$genre]);
        if ($response == true)
            return  $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** #obtener un elemento de la tabla 'book' de la base de datos.
     * 
     */
    public function getBookDetailsDB($id)
    {
        $query = $this->db->prepare('SELECT * FROM book WHERE book.book_id = ?');
        $response = $query->execute([$id]);
        if ($response == true)
            return  $query->fetchAll(PDO::FETCH_OBJ);
        else
            return $response;
    }

    /** #añadir un nuevo libro a los registros.
     * 
     */
    public function addBookDB($name, $author, $details, $idGenreFK)
    {
        $query = $this->db->prepare('INSERT INTO book (book_id, book_name, author, details, id_genre_fk ) VALUES (NULL, ?, ?, ?, ?)');
        $response = $query->execute([$name, $author, $details, $idGenreFK]);
        return $response;
    }

    /** #editar un libro.
     * 
     * 
     */
    public function editBookDB($name, $author, $details, $idGenreFk, $idBook)
    {
        $query = $this->db->prepare('UPDATE book SET book_name =? , author =? , details =?, id_genre_fk = ? WHERE book_id = ?');
        $response = $query->execute([$name, $author, $details, $idGenreFk, $idBook]);
        return $response;
    }
}
