<?php

namespace app\src\Menu;

use app\config\Controller;
class MenuController extends Controller{
    
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $data['title'] = 'Menu';

        //memparsing data ke halaman view
        $this->viewFrontPage('Menu/MenuIndexView',$data);
    }
}