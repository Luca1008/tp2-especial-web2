<?php

require_once './smarty-4.2.1/libs/Smarty.class.php';

class articleView{

    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    function viewArticle($article){
        $this->smarty->assign('article', $article);

        $this->smarty->display('showArticle.tpl');
    }
    function showEditArticle($article, $list){
        $this->smarty->assign('Types', $article);

        $this->smarty->assign('lists', $list);

        $this->smarty->display('editFormArticle.tpl');
    }
}