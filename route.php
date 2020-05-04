<?php
require_once('view/view.php');
require_once('controller/controller.php');


define("URLBASE", '"http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . '/"');




$controller = new controller();
$view = new view();


if (empty($_GET['action'])) {
    $view->home();
    die;
}

$actions = explode('/', $_GET['action']);
echo $actions[0];

switch ($actions[0]) {
    case '':
       
    break;
    default:
      
}
