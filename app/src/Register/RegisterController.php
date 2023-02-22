<?php

class RegisterController extends Controller{
    
    public function index()
    {
        $data['title'] = 'Register';


        $this->view('template/cms/header',$data);
        $this->view('Register/RegisterView',$data);
        $this->view('template/cms/scriptDefault');
    }
}