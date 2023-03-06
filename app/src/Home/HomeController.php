<?php

namespace app\src\Home;

use app\config\Controller;
use app\config\Session;
class HomeController extends Controller{
    protected $session;
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $this->session = new Session; 
        
        if(array_key_exists('user_id', $_SESSION)){

            $data['script'] = 'Home/HomeScript';
            $data['title'] = 'Home';
            
            //memparsing data ke halaman view
            $this->viewCMS('Home/HomeIndexView',$data);
        }
        else{
            header('Location: '.BASEURL.'/login');
        }
    }
}