<?php

class authHelper
{
    /** #verificar si hay una sesion iniciada.
     * 
     *  @return _SESSION['username'].
     */
    public function sessionIsOpen()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (!isset($_SESSION['userName']))
            return NULL;
        else
            return $_SESSION['userName'];
    }
}
