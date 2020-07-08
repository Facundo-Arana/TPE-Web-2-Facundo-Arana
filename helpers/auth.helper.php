<?php

class AuthHelper
{

    static private function start()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    static public function login($user)
    {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID_USER'] = $user->id_user;
        $_SESSION['USERNAME'] = $user->userName;
        $_SESSION['PRIORITY'] = $user->priority;
        if ($_SESSION['PRIORITY'] == 2)
            header('location:' . URLBASE . 'library/admin');
        else
            header('location:' . URLBASE . 'library/home');
    }

    public static function guestAccess()
    {
        self::start();
        $_SESSION['USERNAME'] = 'Guest';
        $_SESSION['PRIORITY'] = 0;
        header('location:' . URLBASE . 'library/home');
    }

    public static function getUserData()
    {
        self::start();
        if (!isset($_SESSION['IS_LOGGED']))
            return NULL;
        else {
            $userData['id'] = $_SESSION['ID_USER'];
            $userData['is_logged'] = $_SESSION['IS_LOGGED'];
            $userData['userName'] = $_SESSION['USERNAME'];
            $userData['priority'] = $_SESSION['PRIORITY'];
            return  $userData;
        }
    }

    public static function getUserGuest()
    {
        self::start();
        $userData = [];
        if (isset($_SESSION['USERNAME']) && isset($_SESSION['PRIORITY'])) {
            $userData['userName'] = $_SESSION['USERNAME'];
            $userData['priority'] = $_SESSION['PRIORITY'];
            return $userData;
        } else
            return null;
    }

    public static function authorityCheck()
    {
        self::checkLoggedIn();
        if ($_SESSION['PRIORITY'] != 2)
            header('location:' . URLBASE . 'library/login');
    }

    public static function checkLoggedIn()
    {
        self::start();
        if (!isset($_SESSION['IS_LOGGED']))
            header('location:' . URLBASE . 'library/login');
    }

    public static function logout()
    {
        self::start();
        unset($_SESSION['IS_LOGGED']);
        unset($_SESSION['ID_USER']);
        unset($_SESSION['USERNAME']);
        unset($_SESSION['PRIORITY']);
        session_destroy();
        header('location:' . URLBASE . 'library/login');
    }
}
