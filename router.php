<?php
require_once('controller/userController.php');
require_once('controller/sessionController.php');
require_once('controller/adminController.php');

define('URLBASE', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$actions = explode('/', $_GET['action']);

if (!isset($actions[1]) || ($actions[1] == '')) {
    header('Location: ' . URLBASE . 'library/login');
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
        if (!isset($actions[2]))
            $userController->getHome();

        elseif (!isset($actions[3]))
            $userController->getBooksByGenre($actions[2]);

        else
            $userController->getBookDetails($actions[2], $actions[3]);

        break;

    case 'allBooks':
        $userController->getAllBooks();
        break;

    case 'checking':
        $sessionController->verify($_POST['user'], $_POST['password']);
        break;

    case 'logOut':
        $sessionController->logOut();
        break;

    case 'admin':
        if (!isset($actions[2]))
            $sessionController->getAdminView();

        elseif (!isset($actions[3])) {
            switch ($actions[2]) {
                case 'newGenre':
                    $adminController->createNewGenre($_POST['nameGenre']);
                    break;

                case 'editGenre':
                    $adminController->editGenre($_POST['newName'], $_POST['idGenre']);
                    break;

                case 'deleteGenre':
                    $adminController->deleteGenre($_POST['idGenre']);
                    break;


                default:
                    $sessionController->getAdminView();
            }
        } else {
        }
        break;
    default:
        $adminController->routerError('parametro no contemplado en el router');
}
