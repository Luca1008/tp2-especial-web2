<?php

class TypeModel {
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=libreria;charset=utf8', 'root', '');
    }

    public function insertType($type,$pasillo){
        $query = $this->db->prepare("INSERT INTO `type` (type, pasillo) VALUES (?, ?)");
        $query->execute([$type,$pasillo]);

        return $this->db->lastInsertId();
    }

    public function deleteTypeById($id) {
        $query = $this->db->prepare("DELETE FROM `type` WHERE Id_type = ?");
        $query->execute([$id]);
    }

    function getType($id){
        $query = $this->db->prepare("SELECT * FROM `type` WHERE Id_type = ?");
        $query->execute([$id]);
        $type = $query->fetch(PDO::FETCH_OBJ);
        return $type;
    }

    function uploadEditType($id,$type,$pasillo){
        $query = $this->db->prepare("UPDATE type SET type = ?, pasillo = ? WHERE Id_type = ?");
        $query->execute([$type, $pasillo, $id]); 
    }
}