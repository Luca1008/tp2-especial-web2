<?php
require_once 'app/models/type.model.php';
require_once 'app/views/type.view.php';
require_once './helper/adminHelper.php';

class TypeController {
    private $model;
    private $view;
    private $helper;
    public function __construct()
    {
        $this->model = new TypeModel();
        $this->view = new typeView();
        $this->helper = new adminHelper();
    }

    
    public function addType(){
        $this->helper->checkLoggedIn();
        $type = $_POST['type'];
        $pasillo = $_POST['pasillo'];
        
        $id = $this->model->insertType($type,$pasillo);
        header("location: " . BASE_URL);
    }
    public function deleteType($id){
        $this->helper->checkLoggedIn();
        $this->model->deleteTypeByid($id);
        header("Location: " . BASE_URL);
    }
    public function editType($id){
        $this->helper->checkLoggedIn();
        $type = $this->model->getType($id);
        $this->view->showEditType($type);
    }
    public function uploadType($id){
        $this->helper->checkLoggedIn();
        $type = $_POST['type'];
        $pasillo = $_POST['pasillo'];
        $this->model->uploadEditType($id,$type,$pasillo);
        header("Location: " . BASE_URL);
    }
}