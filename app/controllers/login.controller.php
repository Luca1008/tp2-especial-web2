<?php
require_once './app/views/login.view.php';
require_once './app/models/login.model.php';
class LoginController {
    private $view;
    private $model;

    public function __construct() { 
        $this->view = new iniAdmin();
        $this->model = new loginModel();
        session_start();
    }
    
    public function loginAdmin(){
        $this->view->formAdmin();
    }

    public function validate(){
        // toma los datos del form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // busco el usuario por email
        $user = $this->model->getUserByEmail($email);

        // verifico que el usuario existe y que las contraseñas son iguales
        if ($user && password_verify($password, $user->contrasenia)) {

            // inicio una session para este usuario
            session_start();
            $_SESSION['USER_ID'] = $user->id_admin;
            $_SESSION['USER_NAME'] = $user->nombre_admin;
            $_SESSION['IS_LOGGED'] = true;


            header("Location: " . BASE_URL);
        } else {
            // si los datos son incorrectos muestro el form con un erro
            $this->view->formAdmin("El usuario o la contraseña no existe.");
        }
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}