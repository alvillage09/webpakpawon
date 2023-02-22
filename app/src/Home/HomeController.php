<?php

class HomeController extends Controller{
    
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $data['user'] = $this->model('Home/HomeModel')->getAll();
        $data['script'] = 'Home/HomeScript';
        $data['title'] = 'Home';

        //memparsing data ke halaman view
        $this->viewCMS('Home/HomeIndexView',$data);
    }
}