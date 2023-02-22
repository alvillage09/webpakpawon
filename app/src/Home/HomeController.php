<?php

class HomeController extends Controller{
    
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $data['user'] = $this->model('Home/HomeModel')->getAll();

        //memparsing data ke halaman view
        $this->view('Home/HomeIndexView',$data);
    }
}