<?php
require_once './libs/Router.php';
require_once './app/controllers/ApiBookController.php';
require_once './app/controllers/ApiAuthController.php';



$router = new Router();

//Libros
$router->addRoute('book', 'GET', 'ApiBookController', 'getBooks');
$router->addRoute('book/:ID', 'GET', 'ApiBookController', 'getBook');
$router->addRoute('book', 'POST', 'ApiBookController', 'addBook');
$router->addRoute('book/:ID', 'PUT', 'ApiBookController', 'editBook');
$router->addRoute('book/:ID', 'DELETE', 'ApiBookController', 'deleteBook');

//Token
$router->addRoute('auth/token', 'GET', 'ApiAuthController', 'getToken');

//Página no encontrada
$router->setDefaultRoute('ApiBookController', 'pageNotFound');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
