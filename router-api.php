<?php
require_once('libs/router/Router.php');
require_once('api/apiController.php');

// creo el ruteador usando la libreria externa
$router = new Router();

// obtener datos un libro o de todos.
$router->addRoute('book/:ID', 'GET', 'apiController', 'getBook');
$router->addRoute('book', 'GET', 'apiController', 'getBook');

// obtener datos de un usuario (para autocompletar un formulario).
$router->addRoute('user/:ID', 'GET', 'apiController', 'getUser');

// obtener comentarios de un libro.
$router->addRoute('comments/book/:ID', 'GET', 'apiController', 'getComments');

// borrar un comentario.
$router->addRoute('comment/:ID', 'DELETE', 'apiController', 'deleteComment');

// postear un comentario.
$router->addRoute('comment', 'POST', 'apiController', 'postComment');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
