<?php

namespace app\src\Menu;

use app\config\Controller;
use app\config\Session;
class MenuController extends Controller{

    protected $session;

    public function __construct()
    {
        $this->session = new Session; 
    }
    
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $data['title'] = 'Menu';
        if(array_key_exists('employee_id', $_SESSION)){
            
            $data['employee_id'] = $this->session->getValue('employee_id');
            $this->viewCMS('Menu/MenuIndexViewCMS',$data);
        }
        else{
            //memparsing data ke halaman view front page
            $this->viewFrontPage('Menu/MenuIndexViewFrontPage',$data);
        }
    }

    public function store()
    {
        
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}