<?php
require_once('libs/Smarty.class.php');

class adminView
{

    private $smarty;
    
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }

    public function errorView($mensagge){
        echo('TODO error View');
    }




    public function showAdminView(){

        $this->smarty->display('templates/adminView.tpl');

    }

}