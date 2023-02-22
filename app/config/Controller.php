<?php

class Controller {
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
}