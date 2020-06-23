<?php
require_once('model/userModel.php');
require_once('model/bookModel.php');
require_once('api/APIView.php');

class apiController
{
    private $user_model;
    private $book_model;
    private $view;

    public function __construct()
    {
        $this->user_model = new userModel();
        $this->book_model = new bookModel();
        $this->view = new APIView();
    }

    public function getUser($params = [])
    {
        if (!empty($params)) {
            $id_user = $params[':ID'];
            $user = $this->user_model->getUserById($id_user);
            if ($user)
                $this->view->response($user, 200);
            else
                $this->view->response("no existe usuario con id {$id_user}", 404);
        }
    }

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
                $this->view->response("no existe libro con id {$idBook}", 404);
        }
    }
}
