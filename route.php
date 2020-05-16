<?php
require_once('controller/userController.php');
require_once('controller/sessionController.php');
require_once('controller/adminController.php');

define('URLBASE', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$actions = explode('/', $_GET['action']);

if (!isset($actions[1])) {
    header('Location: library/login');
    die;
}

$userController = new userController();
$sessionController = new sessionController();
$adminController = new adminController();

switch ($actions[1]) {
    case 'login':
        $userController->getLogin();
        break;

    case 'home':
        if (!isset($actions[2])) {
            $userController->getHome();
            break;
        } elseif (!isset($actions[3])) {
            $userController->getBooksByGenre($actions[2]);
            break;
        } else
            $userController->getBookDetails($actions[2], $actions[3]);
        break;

    case 'checking':
        $sessionController->verify($_POST['user'], $_POST['password']);
        break;

    case 'logOut':
        $sessionController->logOut();
        break;

    case 'admin':
        $adminController->getAdminView();
        break;

    default:
        $userController->showError('parametro no contemplado en el route');
}
