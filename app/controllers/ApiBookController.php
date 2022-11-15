<?php
require_once 'app/models/book.model.php';
require_once 'app/views/api.view.php';
require_once 'app/helper/ApiAuthHelper.php';

class ApiBookController {
    private $model;
    private $view;
    private $helper;
    private $data;

    /**
     * The constructor function is used to create a new instance of the BookController class
     */
    public function __construct()
    {
        $this->model = new BookModel();
        $this->view = new APIView();
        $this->helper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }
    /**
     * It takes a JSON string, decodes it, and returns the result.
     * 
     * @return The data is being returned as a JSON object.
     */
    private function getData(){
        return json_decode($this->data);
    }

    /**
     * It gets the books from the database and returns them in a json format.
     */
    public function getBooks(){
        $sortByDefault = "id_article";
        $orderDefault = "asc";
        $size_pages = 10;
        $page = 1;
        if (isset($_GET["page"])){
            $page = $this->ConvertNatural($_GET["page"], $page);
        }
        if (isset($_GET["sortby"])){
            $sortBy = $this->checkToSanitize($_GET["sortby"]);
        }
        if(isset($_GET["order"])){
            $order = $_GET["order"];
        }
        if(isset($_GET["element"])){
            $element = $_GET["element"];
        }
        if (isset($_GET["section"])) {
            $section = $this->checkToSanitize($_GET["section"]);
        }
        $start_where = ($page - 1) * $size_pages;
        try {
            if (!empty($sortBy) && !empty($order) && empty($section) && empty($element)) {
                $book = $this->model->getTablaBook($start_where, $size_pages, $sortBy, $order);
            }
             else if (!empty($sortBy) && empty($order) && empty($section) && empty($element)) {
                $book = $this->model->getTablaBook($start_where, $size_pages, $sortBy, $orderDefault);
            } 
            else if (!empty($order) && empty($sortBy) && empty($section) && empty($element)) {
                $book = $this->model->getTablaBook($start_where, $size_pages, $sortByDefault, $order);
            } 
            else if (!empty($section) && !empty($element) && empty($sortBy) && empty($order)) {
                $book = $this->model->filterByFields($section, $element, $start_where, $size_pages, $sortByDefault, $orderDefault);
            } 
            else if (!empty($section) && !empty($element) && !empty($sortBy) && !empty($order)) {
                $book = $this->model->filterByFields($section, $element, $start_where, $size_pages, $sortBy, $order);
            } 
            else if (!empty($section) && !empty($element) && !empty($sortBy) && empty($order)){
                $book = $this->model->filterByFields($section,$element,$start_where,$size_pages,$sortBy,$orderDefault);
            } 
            else if (!empty($section) && !empty($element) && !empty($order) && empty($sortBy)){
                $book = $this->model->filterByFields($section,$element,$start_where,$size_pages,$sortByDefault,$order);
            } 
            else {
                $book = $this->model->getTablaBook($start_where, $size_pages, $sortByDefault, $orderDefault);
            }
        } catch (Exception) {
            $this->view->response("Error: El servidor no pudo interpretar la solicitud dada una sintaxis invalida", 400);
        }
        if(isset($book)){
            $this->view->response($book, 200);
        }
    }

    /**
     * It gets a book from the database and returns it to the user
     * 
     * @param params The parameters from the URL.
     */
    public function getBook($params=null){
        $id = $params[':ID'];
        $book = $this->model->getBook($id);
        if ($book) {
            $this->view->response($book, 200);
        } else {
            $this->view->response("La pelicula con el id = $id no existe", 404);
        }
    }

    /**
     * It adds a book to the database.
     * 
     * @return a response to the client.
     */
    public function addBook(){
        if (!$this->helper->isLoggedIn()) {
            $this->view->response("No estas logeado", 401);
            return;
        }
        $book = $this->getData();
        try {
            if (empty($book->nombre_libro) || empty($book->description) || empty($book->autor) || empty($book->id_type) || empty($book->precio)) {
                $this->view->response("Faltan completar campos", 400);
            } else {
                $id = $this->model->insertBook($book->nombre_libro, $book->id_type, $book->autor, $book->precio, $book->description);
                $book = $this->model->getBook($id);
                $this->view->response("Libro agregado con exito", 201);
            }
        } catch (Exception) {
            $this->view->response("Error: El servidor no pudo interpretar la solicitud dada una sintaxis invalida", 400);
        }
    }

    /**
     * It deletes a book from the database
     * 
     * @param params The parameters passed to the method.
     */
    public function deleteBook($params=null){
        if (!$this->helper->isLoggedIn()) {
            $this->view->response("No estas logeado", 401);
            return;
        }
        try{
            $id = $params[':ID'];
            $book = $this->model->getBook($id);
            if ($book) {
                $this->model->deleteBookById($id);
                $this->view->response("El libro se vendio  con éxito", 200);
            } else {
                $this->view->response("El libro con el id = $id no existe", 404);
            }
        }catch (Exception) {
            $this->view->response("Error: El servidor no pudo interpretar la solicitud dada una sintaxis invalida", 400);
        }
        
    }

    /**
     * It edits a book in the database
     * 
     * @param params The parameters from the URL.
     * 
     * @return the book with the id that was passed as a parameter.
     */
    public function editBook($params=null){
        if (!$this->helper->isLoggedIn()) {
            $this->view->response("No estas logeado", 401);
            return;
        }
        $id = $params[':ID'];
        $book = $this->model->getBook($id);
        try {
            if ($book) {
                $book = $this->getData();
                if (empty($book->nombre_libro) || empty($book->description) || empty($book->autor) || empty($book->id_type) || empty($book->precio)) {
                    $this->view->response("Faltan completar campos", 400);
                } else {
                    $this->model->uploadEditBook($id,$book->nombre_libro, $book->id_type, $book->autor, $book->precio, $book->description);
                    $this->view->response("El libro con el id = $id actualizado con éxito", 200);
                }
            }
            else{
                $this->view->response("No se encontro el libro",404);
            }
        } catch (Exception) {
            $this->view->response("Error: El servidor no pudo interpretar la solicitud dada una sintaxis invalida", 400);
        }
    }


    /**
     * If the parameter is a positive integer, return the parameter. Otherwise, return the default
     * parameter
     * 
     * @param param The parameter to be converted.
     * @param defaultParam The default value to use if the parameter is not a natural number.
     * 
     * @return The result of the function.
     */
    public function ConvertNatural($param, $defaultParam){
        $result = intval($param);
        if ($result > 0) {
            $result = $param;
        } else {
            $result = $defaultParam;
        }
        return $result;
    }

    /**
     * If the parameter passed to the function is in the array, return the parameter, otherwise return
     * null.
     * 
     * @param params id_article, id_type, nombre_libro, type, precio, pasillo, autor, description
     * 
     * @return the value of the key in the array.
     */
    public function checkToSanitize($params){
        $fields = array(
            'id_article'=>'id_article',
            'id_type'=>'id_type',
            'nombre_libro'=>'nombre_libro',
            'type'=>'type',
            'precio'=>'precio',
            'pasillo'=>'pasillo',
            'autor'=>'autor',
            'description'=>'description'
            
        );
        if(isset($fields[$params])){
            return $params;
        }else{
            return null;
        }
    }

    /**
     * If the page is not found, then show the pageNotFound() function.
     */
    public function pageNotFound(){
        $this->view->response("Pagina no encontrada", 404);
    }


}