<?php

namespace app\src\Login;

use app\config\Controller;

class LoginController extends Controller{

    public function index()
    {
        $data['title'] = 'Login'; 

        $this->view('template/cms/header',$data);
        $this->view('Login/LoginView',$data);
        $this->view('template/cms/scriptDefault');
    }

    public function login()
    {  
        $username = $_POST["username"];
        $password = $_POST["password"];
        $data['user'] = $this->model('Login/LoginModel')->getUser($username,$password);
        
        if($data['user']){
            header('Location: '.BASEURL);
        }else{
            header('Location: '.BASEURL.'/login');
        }
    }
}