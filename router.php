<?php
require_once './app/controllers/login.controller.php';
require_once './app/controllers/type.controller.php';
require_once './app/controllers/article.controller.php';
require_once './app/controllers/initial.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'beginning'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

$initialController = New InitialController();
$loginController = new LoginController();
$typeController = new TypeController();
$articleController = new ArticleController();

// tabla de ruteo
switch ($params[0]) {
    case 'beginning':
        $initialController->showBeginning();
        break;
    case 'showFiltro':
        if (!empty($params[1])) {
            $initialController->showFiltro($params[1]);
        } else {
            $initialController->showBeginning();
        }
        break;
    case 'login':
        $loginController->loginAdmin();
        break;
    case 'validate':
        $loginController->validate();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case "addType":
        
        $typeController->addType();
        break;
    case "editType":
        
        $id = $params[1];
        $typeController->editType($id);
        break;
    case "uploadType":
        
        $id = $params[1];
        $typeController->uploadType($id);
        break;
    case "deleteType":
        
        $id = $params[1];
        $typeController->deleteType($id);
        break;
    case "addArticle":
        
        $articleController->addArticle();
        break;
    case "editArticle":
        
        $id = $params[1];
        $articleController->editArticle($id);
        break;
    case "uploadArticle":
    
        $id = $params[1];
        $articleController->uploadArticle($id);
        break;
    case "deleteArticle":
        
        $id = $params[1];
        $articleController->deleteArticle($id);
        break;
    case 'description':
        $id = $params[1];
        $articleController->showDescription($id);
        break;
    default:
        echo('404 Page not found');
        break;
}
