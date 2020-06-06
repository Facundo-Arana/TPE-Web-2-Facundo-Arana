<?php
require_once('libs/smarty/Smarty.class.php');
class view 
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->getSmarty()->assign('url', URLBASE);         
    }

    public function getSmarty()
    {
        return $this->smarty;
    }

}
