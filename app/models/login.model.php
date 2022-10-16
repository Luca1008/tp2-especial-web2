<?php

class loginModel{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=libreria;charset=utf8', 'root', '');
    }

    function getUserByEmail($email)
    {
        $query = $this->db->prepare("SELECT * FROM admin WHERE email_admin = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}