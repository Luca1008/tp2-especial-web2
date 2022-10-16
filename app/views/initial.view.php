<?php
require_once './smarty-4.2.1/libs/Smarty.class.php';

class initialView{
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        
    }
    public function showTabla($tablas1, $tablas2){
        $this->smarty->assign('count',count($tablas1));
        $this->smarty->assign('Types', $tablas1);

        $this->smarty->assign('count',count($tablas2));
        $this->smarty->assign('Articles', $tablas2);

        $this->smarty->display('cuerpo.tpl');
    }

}