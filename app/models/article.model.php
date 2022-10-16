<?php

class ArticleModel {
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=libreria;charset=utf8', 'root', '');
    }

    public function insertArticle($nombre,$typo,$autor,$precio,$descripcion){
        $query = $this->db->prepare("INSERT INTO `article` (`id_article`, `id_type`, `nombre_libro`, `autor`, `precio`, `description`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([NULL, $typo,$nombre,$autor,$precio,$descripcion]);

        return $this->db->lastInsertId();
    }

    public function deleteArticleById($id){
        $query = $this->db->prepare("DELETE FROM `article` WHERE id_article = ?");
        $query->execute([$id]);
    }

    public function getArticle($id){
        $query = $this->db->prepare("SELECT * FROM `article` WHERE id_article = ?");
        $query->execute([$id]);
        $article = $query->fetch(PDO::FETCH_OBJ);
        return $article;
    }
    public function getTablaTypeList()
    {
        $query1 = $this->db->prepare("SELECT * FROM `type`");
        $query1->execute();

        $tablas = $query1->fetchAll(PDO::FETCH_OBJ);
        return $tablas;
    }

    function uploadEditArticle($id,$libro,$tipo,$autor,$precio,$des){
        $query = $this->db->prepare("UPDATE `article` SET `id_type` = ?, `nombre_libro` = ?, `autor` = ?, `precio` = ?, `description` = ? WHERE `article`.`id_article` = ?");
        $query->execute([$tipo, $libro, $autor, $precio, $des, $id]); 
    }
}