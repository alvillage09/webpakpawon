<?php

class LoginController extends Controller{
    
    public function index()
    {
        $data['title'] = 'Login';


        $this->view('template/cms/header',$data);
        $this->view('Login/LoginView',$data);
        $this->view('template/cms/scriptDefault');
    }
}