<?php 
require_once './smarty-4.2.1/libs/Smarty.class.php';

class iniAdmin {
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    function formAdmin($error = null){
        $this->smarty->assign("error", $error);
        $this->smarty->display('login.tpl');
    }
}