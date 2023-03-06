<?php

namespace app\config;
use app\config\Session;
class Controller {

    protected $session;
    public function __construct()
    {
        $this->session = new Session;
    }
    
    //fungsi untuk view
    public function view($view, $data = [])
    {
        //untuk memanggil file view (yang dilihat end user)
        require_once '../app/src/'.$view. '.php';
    }

    public function model($model)
    {
        //untuk memanggil file model 
        require_once '../app/src/'.$model. '.php';
        //memecah $model kedalam array
        $mdlarr = explode('/', $model);
        $mdlarr = end($mdlarr);
        //memanggil data array paling akhir
        // $nmspc = 'app\src\\'.reset($mdlarr).'\\'.end($mdlarr);
        
        //mengembalikan sekaligus meninstansiasi objek dari clas model
        return new $mdlarr;
    }

    //fungsi untuk view template cms
    public function viewCMS($view, $data = [])
    {
        if(array_key_exists('user_id', $_SESSION)){
            $data['user_name'] = $this->session->getValue('user_name');
        }
        $this->view('template/cms/header',$data);
        $this->view('template/cms/navbar',$data);
        $this->view('template/cms/sidebar');
        $this->view('template/cms/mainTop');
        $this->view($view,$data);
        $this->view('template/cms/mainBottom');
        $this->view('template/cms/footer');
        if (array_key_exists("script",$data)) {
            $this->view($data["script"]);
        }
        $this->view('template/cms/scriptDefault');
    }

    //fungsi untuk view template frontpage
    public function viewFrontPage($view, $data = [])
    {
        $this->view('template/frontpage/header',$data);
        $this->view('template/frontpage/navbar');
        $this->view($view,$data);
        $this->view('template/frontpage/footer');
        if (array_key_exists("script",$data)) {
            $this->view($data["script"]);
        }
        $this->view('template/frontpage/scriptDefault');
    }
}