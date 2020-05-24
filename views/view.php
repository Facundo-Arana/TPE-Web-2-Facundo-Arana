<?php
require_once('libs/Smarty.class.php');

require_once('helpers/auth.helper.php');
class view 
{
    private $smarty;
    function __construct()
    {
        $a = new authHelper();
        $b = $a->sessionIsOpen();
        $this->smarty = new Smarty();
        $this->getSmarty()->assign('user', $b); 
        $this->getSmarty()->assign('url', URLBASE);         
    }

    public function getSmarty()
    {
        return $this->smarty;
    }

}
