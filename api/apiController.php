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
            $tasks = $this->model->getAllBooksDB();
            $this->view->response($tasks, 200);
        } else {
            $idBook = $params[':ID'];
            $task = $this->model->getBookDetailsDB($idBook);
            if ($task)
                $this->view->response($task, 200);
            else
                $this->view->response("no existe tarea con id {$idBook}", 404);
        }
    }
}
