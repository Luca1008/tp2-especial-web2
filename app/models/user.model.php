<?php

class UserModel {
    private $db;
    
    /**
     * It creates a new PDO object.
     */
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=libreria;charset=utf8', 'root', '');
    }

    /**
     * It returns a user object from the database.
     * 
     * @param email admin@admin.com
     * 
     * @return An object.
     */
    function getUser($email){
        $query = $this->db->prepare("SELECT * FROM admin WHERE email_admin = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}