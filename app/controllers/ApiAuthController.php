<?php

require_once './app/models/user.model.php';
require_once './app/views/api.view.php';
require_once './app/helper/ApiAuthHelper.php';

function base64url_encode($data){
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}


class ApiAuthController{

    private $model;
    private $view;
    private $authHelper;

    private $data;

    /**
     * The constructor function is called when the class is instantiated. It is used to initialize the
     * class.
     */
    public function __construct(){
        $this->model = new UserModel();
        $this->view = new APIView();
        $this->authHelper = new AuthHelper();

        $this->data = file_get_contents("php://input");
    }


    /**
     * It takes the user and password from the header, checks if they are correct, and if they are, it
     * creates a token.
     * 
     * @return The token is being returned.
     */
    public function getToken(){
        $basic = $this->authHelper->getAuthHeader();

        if (empty($basic)) {
            $this->view->response('No autorizado', 401);
            return;
        }
        $basic = explode(" ", $basic);
        if ($basic[0] != "Basic") {
            $this->view->response('La autenticación debe ser Basic', 401);
            return;
        }

        $userpass = base64_decode($basic[1]);
        $userpass = explode(":", $userpass);
        $user = $userpass[0];
        $pass = $userpass[1];
        $account = $this->model->getUser($user);
        if ($user == $account->email_admin && password_verify($pass, $account->contrasenia)) {
            $header = array(
                'alg' => 'HS256',
                'typ' => 'JWT'
            );
            $payload = array(
                'id' => $account->id_admin,
                'name' => $account->nombre_admin,
                'exp' => time() + 3600
            );
            $header = base64url_encode(json_encode($header));
            $payload = base64url_encode(json_encode($payload));
            $signature = hash_hmac('SHA256', "$header.$payload", "L1008", true);
            $signature = base64url_encode($signature);
            $token = "$header.$payload.$signature";
            $this->view->response($token, 200);
        } else {
            $this->view->response('No autorizado', 401);
        }
    }
}