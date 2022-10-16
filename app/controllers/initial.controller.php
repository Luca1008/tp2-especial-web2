<?php
require_once './app/models/initial.model.php';
require_once './app/views/initial.view.php';

class InitialController {
    private $model;
    private $view;
    
    public function __construct()
    {
        $this->model = new initialModel();
        $this->view = new initialView();
        
    }
    public function showBeginning(){
        $tablas1 = $this->model->getTablaType();
        $tablas2 = $this->model->getTablaArticle();
        $this->view->showTabla($tablas1, $tablas2);
    }
    public function showFiltro($id){
        $tablas1 = $this->model->getTablaType();
        $filtros = $this->model->getFilterArticle($id);
        $this->view->showTabla($tablas1,$filtros);
    }

}