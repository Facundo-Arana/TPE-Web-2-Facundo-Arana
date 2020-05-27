<?php
require_once('controller/homeController.php');
require_once('controller/adminController.php');
require_once('helpers/auth.helper.php');

define('URLBASE', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$actions = explode('/', $_GET['action']);

if (!isset($actions[1]) || ($actions[1] == '')) {
    header('Location: ' . URLBASE . 'library/login');
    die;
}

$homeController = new homeController();
$adminController = new adminController();

switch ($actions[1]) {
    case 'login':
        $homeController->getLogin();
        break;
    case 'home':
        $homeController->getHome();
        break;
    case 'genre':
        $homeController->getBooksByGenre($actions[2]);
        break;
    case 'book':
        $homeController->getBookDetails($actions[2]);
        break;
    case 'allBooks':
        $homeController->getAllBooks();
        break;
    case 'verify':
        $adminController->verify($_POST['user'], $_POST['password']);
        break;
    case 'logOut':
        $adminController->logOut();
        break;
    case 'admin':
        if (!isset($actions[2]))
            $adminController->getAdminViews();
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
                case 'addBook':
                    $adminController->addBook($_POST);
                    break;
                case 'editBook':
                    $adminController->editBook($_POST);
                    break;
                case 'deleteBook':
                    $adminController->deleteBook($_POST['idBook']);
                default:
                    $adminController->getAdminView();
            }
        }
        break;
    default:
        $adminController->routerError('page not found 404');
}
