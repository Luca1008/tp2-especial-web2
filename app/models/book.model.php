<?php

class BookModel {
    private $db;

    /**
     * The above function is a constructor function that creates a new PDO object and assigns it to the
     *  property
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=libreria;charset=utf8', 'root', '');
    }

    /**
     * It gets the data from the database and returns it as an object.
     * 
     * @param start_where the starting point of the query
     * @param size_pages the number of records to display per page
     * @param sort the column name to sort by
     * @param order ASC or DESC
     * 
     * @return An array of objects.
     */
    public function getTablaBook($start_where, $size_pages, $sort, $order)
    {
        $query2 = $this->db->prepare("SELECT a.*, b.*
        FROM article a
        INNER JOIN type b
        ON a.id_type = b.Id_type ORDER BY $sort $order LIMIT $start_where,$size_pages");
        $query2->execute();

        $tablas = $query2->fetchAll(PDO::FETCH_OBJ);
        return $tablas;
    }

    /**
     * It returns all the books that have the same type as the one passed as a parameter.
     * 
     * @param section the name of the column in the database
     * @param element the value of the field you want to filter by
     * 
     * @return An array of objects.
     */
    function filterByFields($section, $element){
        $query = $this->db->prepare("SELECT a.*, b.*
        FROM article a
        INNER JOIN type b
        ON a.id_type = b.Id_type WHERE $section = ?");
        $query->execute([$element]);
        $books = $query->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    /**
     * It takes the parameters ,,,, and inserts them into the
     * database.
     * 
     * @param nombre name of the book
     * @param typo 1
     * @param autor author
     * @param precio is a float
     * @param descripcion text
     * 
     * @return The last inserted id.
     */
    public function insertBook($nombre,$typo,$autor,$precio,$descripcion){
        $query = $this->db->prepare("INSERT INTO `article` (`id_article`, `id_type`, `nombre_libro`, `autor`, `precio`, `description`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([NULL, $typo,$nombre,$autor,$precio,$descripcion]);

        return $this->db->lastInsertId();
    }

    /**
     * It deletes a book from the database by its id
     * 
     * @param id The id of the book you want to delete.
     */
    public function deleteBookById($id){
        $query = $this->db->prepare("DELETE FROM `article` WHERE id_article = ?");
        $query->execute([$id]);
    }

    /**
     * It gets a book from the database
     * 
     * @param id The id of the book you want to get.
     * 
     * @return An object.
     */
    public function getBook($id){
        $query = $this->db->prepare("SELECT * FROM `article` WHERE id_article = ?");
        $query->execute([$id]);
        $article = $query->fetch(PDO::FETCH_OBJ);
        return $article;
    }

    /**
     * Update the table article, set the id_type to , the nombre_libro to , the autor to
     * , the precio to , the description to , where the id_article is 
     * 
     * @param id id of the book
     * @param libro book name
     * @param tipo type of book
     * @param autor "test"
     * @param precio price
     * @param des description
     */
    function uploadEditBook($id,$libro,$tipo,$autor,$precio,$des){
        $query = $this->db->prepare("UPDATE `article` SET `id_type` = ?, `nombre_libro` = ?, `autor` = ?, `precio` = ?, `description` = ? WHERE `article`.`id_article` = ?");
        $query->execute([$tipo, $libro, $autor, $precio, $des, $id]); 
    }
}