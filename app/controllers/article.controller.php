<?php
require_once 'app/models/article.model.php';
require_once 'app/views/article.view.php';
require_once './helper/adminHelper.php';

class ArticleController {
    private $model;
    private $view;
    private $helper;

    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new articleView();
        $this->helper = new adminHelper();
    }


    public function addArticle(){
        $this->helper->checkLoggedIn();
        $nameBook = $_POST['nomLibro'];
        $type = $_POST['typeLibro'];
        $autor = $_POST['autor'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['des'];

        $id = $this->model->insertArticle($nameBook,$type,$autor,$precio,$descripcion);
        header("location: " . BASE_URL);
    }
    public function deleteArticle($id){
        $this->helper->checkLoggedIn();
        $this->model->deleteArticleById($id);
        header("Location: " . BASE_URL);
    }
    public function editArticle($id){
        $this->helper->checkLoggedIn();
        $article = $this->model->getArticle($id);
        $list = $this->model->getTablaTypeList();
        $this->view->showEditArticle($article, $list);
    }

    public function uploadArticle($id){
        $this->helper->checkLoggedIn();
        $libro = $_POST['nomLibro'];
        $tipo = $_POST['typeLibro'];
        $autor = $_POST['autor'];
        $precio = $_POST['precio'];
        $des = $_POST['des'];
        $this->model->uploadEditArticle($id,$libro,$tipo,$autor,$precio,$des);
        header("Location: " . BASE_URL);
    }
    public function showDescription($id){
        $article = $this->model->getArticle($id);
        $this->view->viewArticle($article);
    }


}