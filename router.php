<?php
require_once('controller/libraryController.php');
require_once('controller/adminController.php');
require_once('controller/usersController.php');

define('URLBASE', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$actions = explode('/', $_GET['action']);

if (!isset($actions[0]) || ($actions[0] == '')) {
    header('Location: ' . URLBASE . 'library/login');
    die;
}

switch ($actions[1]) {
    case 'login':
        $libraryController = new libraryController();
        $libraryController->getLogin();
        break;
    case 'home':
        $libraryController = new libraryController();
        $libraryController->getHome();
        break;
    case 'genre':
        $libraryController = new libraryController();
        $libraryController->getBooksByGenre($actions[2]);
        break;
    case 'book':
        $libraryController = new libraryController();
        $libraryController->getBookDetails($actions[2]);
        break;
    case 'allBooks':
        $libraryController = new libraryController();
        $libraryController->getAllBooks();
        break;
    case 'verify':
        $usersController = new usersController();
        $usersController->verify();
        break;
    case 'validate':
        $usersController = new usersController();
        $usersController->validate();
        break;
    case 'logOut':
        $adminController = new adminController();
        $adminController->logOut();
        break;
    case 'forgetfulUser':
        $usersController = new usersController();
        $usersController->getForgetForm();
        break;
    case 'checkUserToGetToken':
        $usersController = new usersController();
        $usersController->checkUserToGetToken();
        break;
    case 'checkToken':
        $usersController = new usersController();
        $usersController->checkToken();
        break;
    case 'admin':
        if (!isset($actions[2])) {
            $adminController = new adminController();
            $adminController->getAdminViews();
        } else {
            switch ($actions[2]) {
                case 'newGenre':
                    $adminController = new adminController();
                    $adminController->createNewGenre();
                    break;
                case 'editGenre':
                    $adminController = new adminController();
                    $adminController->editGenre();
                    break;
                case 'deleteGenre':
                    $adminController = new adminController();
                    $adminController->deleteGenre();
                    break;
                case 'addBook':
                    $adminController = new adminController();
                    $adminController->addBook();
                    break;
                case 'editBook':
                    $adminController = new adminController();
                    $adminController->editBook();
                    break;
                case 'deleteBook':
                    $adminController = new adminController();
                    $adminController->deleteBook();
                case 'editUser':
                    $adminController = new adminController();
                    $adminController->editPermissions();
                    break;
                case 'deleteUser':
                    $adminController = new adminController();
                    $adminController->deleteUser();
                    break;
                case 'editCover':
                    $adminController = new adminController();
                    $adminController->editCover();
                    break;
                default: {
                        $adminController = new adminController();
                        $adminController->getAdminView();
                    }
            }
        }
        break;
    default: {
            $libraryController = new libraryController();
            $libraryController->getLogin('page not found 404');
        }
}
