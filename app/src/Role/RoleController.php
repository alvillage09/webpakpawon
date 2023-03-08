<?php

namespace app\src\Role;

use app\config\Controller;
use app\config\Helper;
use app\config\Session;
class RoleController extends Controller{
    protected $session;
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $this->session = new Session; 
        
        if(array_key_exists('user_id', $_SESSION)){

            $data['script'] = 'Role/RoleScript';
            $data['title'] = 'Role';
            $data['dataRole'] = $this->model('Role/RoleModel')->getAll();
            
            //memparsing data ke halaman view
            $this->viewCMS('Role/RoleIndexView',$data);
        }
        else{
            header('Location: '.BASEURL.'/login');
        }
    }

    public function store(){
        if( $this->model('Role/RoleModel')->storeData($_POST) > 0 ){
            Helper::setFlash('Data peranan', 'berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/role');
            exit;
        }
        else{
            Helper::setFlash('Data peranan', 'gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/role');
            exit;
        }
    }

    public function update($id){
        if( $this->model('Role/RoleModel')->updateData($_POST) > 0 ){
            Helper::setFlash('Data peranan', 'berhasil', 'dirubah', 'success');
            header('Location: '.BASEURL.'/role');
            exit;
        }
        else{
            Helper::setFlash('Data peranan', 'gagal', 'dirubah', 'danger');
            header('Location: '.BASEURL.'/role');
            exit;
        }
    }

    public function delete($id){
        if( $this->model('Role/RoleModel')->deleteData($id) > 0 ){
            Helper::setFlash('Data peranan', 'berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/role');
            exit;
        }
        else{
            Helper::setFlash('Data peranan', 'gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/role');
            exit;
        }
    }
}