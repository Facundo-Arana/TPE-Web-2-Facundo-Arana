<?php
require_once('view/view.php');
require_once('controller/controller.php');


$urlSite = 'http://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . "/";



$controller = new controller();




if(empty($_GET['action'])){

    
    $controller->view->principalView($urlSite);


}