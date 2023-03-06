<?php

namespace app\src\Login;

use app\config\Controller;
use app\config\Session;

class LoginController extends Controller{

    protected $session;

    public function __construct()
    {
        $this->session = new Session; 
    }

    public function index()
    {
        $data['title'] = 'Login'; 
        
        if(array_key_exists('user_id', $_SESSION)){
            header('Location: '.BASEURL);
        }
        else{
            $this->view('template/cms/header',$data);
            $this->view('Login/LoginView',$data);
            $this->view('template/cms/scriptDefault');
        }
    }

    public function login()
    {  
        $username = $_POST["username"];
        $password = $_POST["password"];
        $data['user'] = $this->model('Login/LoginModel')->getUser($username,$password,'employee');
        
        if($data['user']){
            // var_dump($data['user']);
            header('Location: '.BASEURL);
        }else{
            header('Location: '.BASEURL.'/login');
        }
    }

    public function logout()
    {
        //baca di dokumentasi session_destroy() punya php

        // Unset semua variabel session.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        header('Location: '.BASEURL.'/login');
    }
}