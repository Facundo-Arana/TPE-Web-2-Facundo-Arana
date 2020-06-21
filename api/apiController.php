<?php
require_once('model/bookModel.php');
require_once('api/APIView.php');

class apiController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new bookModel();
        $this->view = new APIView();
    }

    public function getBook($params = [])
    {
        if (empty($params)) {
            $books = $this->model->getAllBooksDB();
            $this->view->response($books, 200);
        } else {
            $idBook = $params[':ID'];
            $book = $this->model->getBookDetailsDB($idBook);
            if ($book)
                $this->view->response($book, 200);
            else
                $this->view->response("no existe tarea con id {$idBook}", 404);
        }
    }
}
