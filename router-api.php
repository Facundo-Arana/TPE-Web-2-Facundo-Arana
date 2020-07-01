<?php
require_once('libs/router/Router.php');
require_once('api/apiController.php');

// creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('book', 'GET', 'apiController', 'getBook');
$router->addRoute('book/:ID', 'GET', 'apiController', 'getBook');
$router->addRoute('user/:ID', 'GET', 'apiController', 'getUser');
$router->addRoute('comments/book/:ID', 'GET', 'apiController', 'getComments');
$router->addRoute('deleteComment/:ID', 'DELETE', 'apiController', 'deleteComment');
$router->addRoute('postComment', 'POST', 'apiController', 'postComment');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
