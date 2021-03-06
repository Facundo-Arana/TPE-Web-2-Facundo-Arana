<?php
require_once('model/userModel.php');
require_once('model/bookModel.php');
require_once('model/commentModel.php');
require_once('api/APIView.php');

class apiController
{
    private $user_model;
    private $book_model;
    private $comment_model;
    private $view;

    public function __construct()
    {
        $this->comment_model = new commentModel();
        $this->user_model = new userModel();
        $this->book_model = new bookModel();
        $this->view = new APIView();
    }

    /**
     *  postear un comentario.
     */
    public function postComment()
    {
        $params = json_decode(file_get_contents("php://input"));
        $res = $this->comment_model->newComment($params->id_book_fk, $params->id_user_fk, $params->content, $params->puntaje);
        if ($res)
            $this->view->response($res, 200);
        else
            $this->view->response(null, 200);
    }

    /**
     *  borrar un comentario.
     */
    public function deleteComment($params = [])
    {
        if (!empty($params)) {
            $id = $params[':ID'];
            $result =  $this->comment_model->searchComment($id);
            if (empty($result)) {
                $this->view->response('comentario inexistente', 200);
                die();
            }
            $res = $this->comment_model->deleteComment($id);
            if ($res)
                $this->view->response($res, 200);
        } else {
            $this->view->response(null, 200);
        }
    }

    /**
     *  obtener comentarios de un libro.
     */
    public function getComments($params = [])
    {
        if (!empty($params)) {
            $id_book = $params[':ID'];
            $comment = $this->comment_model->getBookComments($id_book);
            if ($comment)
                $this->view->response($comment, 200);
            else
                $this->view->response(null, 200);
        }
    }

    /**
     *  obtener datos de un usuario.
     */
    public function getUser($params = [])
    {
        if (!empty($params)) {
            $id_user = $params[':ID'];
            $user = $this->user_model->getUserById($id_user);
            if ($user)
                $this->view->response($user, 200);
            else
                $this->view->response(null, 200);
        }
    }

    /**
     *  obtener datos de libros.
     */
    public function getBook($params = [])
    {
        if (empty($params)) {
            $books = $this->book_model->getAllBooksDB();
            $this->view->response($books, 200);
        } else {
            $idBook = $params[':ID'];
            $book = $this->book_model->getBookDetailsDB($idBook);
            if ($book)
                $this->view->response($book, 200);
            else
                $this->view->response(null, 200);
        }
    }
}
