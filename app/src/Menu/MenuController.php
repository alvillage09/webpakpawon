<?php

class MenuController extends Controller{
    
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $data['title'] = 'Menu';

        //memparsing data ke halaman view
        $this->viewFrontPage('Menu/MenuIndexView',$data);
    }
}