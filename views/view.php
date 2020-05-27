<?php
require_once('libs/Smarty.class.php');
class view 
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $userName = AuthHelper::getUsername();
        $this->getSmarty()->assign('user', $userName); 
        $this->getSmarty()->assign('url', URLBASE);         
    }

    public function getSmarty()
    {
        return $this->smarty;
    }

}
