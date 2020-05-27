<?php

class authHelper
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
        $_SESSION['ID_USER'] = $user[0]->id_user;
        $_SESSION['USERNAME'] = $user[0]->userName;
        header('location:' . URLBASE . 'library/admin');
    }

    public static function getUsername()
    {
        self::start();
        if (!isset($_SESSION['USERNAME']))
            return NULL;
        else
            return  $_SESSION['USERNAME'];
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
        session_destroy();
        header('location:' . URLBASE . 'library/login');
    }
}
