<?php

class Controller {

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
        $mdl = explode('/', $model);
        //memanggil data array paling akhir
        $mdl = end($mdl);

        //mengembalikan sekaligus meninstansiasi objek dari clas model
        return new $mdl;
    }

    //fungsi untuk view template cms
    public function viewCMS($view, $data = [])
    {
        $this->view('template/cms/header',$data);
        $this->view('template/cms/navbar');
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