<?php

class initialModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=libreria;charset=utf8', 'root', '');
    }

    public function getTablaType()
    {
        $query1 = $this->db->prepare("SELECT * FROM `type`");
        $query1->execute();

        $tablas = $query1->fetchAll(PDO::FETCH_OBJ);
        return $tablas;
    }
    public function getTablaArticle()
    {
        $query2 = $this->db->prepare("SELECT a.*, b.*
        FROM article a
        INNER JOIN type b
        ON a.id_type = b.Id_type");
        $query2->execute();

        $tablas = $query2->fetchAll(PDO::FETCH_OBJ);
        return $tablas;
    }

    function getFilterArticle($id)
    {

        $query = $this->db->prepare("SELECT a.*, b.*
        FROM article a
        INNER JOIN type b
        ON a.id_type = b.Id_type 
        WHERE b.Id_type = ?");
        $query->execute([$id]);

        $filtro = $query->fetchAll(PDO::FETCH_OBJ);

        return $filtro;
    }
}
