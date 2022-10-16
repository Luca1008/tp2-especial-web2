<?php

require_once './smarty-4.2.1/libs/Smarty.class.php';

class typeView {
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showEditType($type){
        $this->smarty->assign('type', $type);

        $this->smarty->display('editFormType.tpl');
    }
}