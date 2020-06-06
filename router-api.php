<?php
require_once('libs/router/Router.php');
require_once('api/apiController.php');

// creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('book', 'GET', 'apiController', 'getBook');
$router->addRoute('book/:ID', 'GET', 'apiController', 'getBook');
//$router->addRoute('book/:ID', 'DELETE', 'apiController', 'deletebook');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
