<?php

namespace app\src\Role;

use app\config\Controller;
use app\config\Flasher;
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
            Flasher::setFlash('Peranan', 'berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/role');
            exit;
        }
        else{
            Flasher::setFlash('Peranan', 'gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/role');
            exit;
        }
    }

    public function update($id){
        if( $this->model('Role/RoleModel')->updateData($_POST) > 0 ){
            Flasher::setFlash('Peranan', 'berhasil', 'dirubah', 'success');
            header('Location: '.BASEURL.'/role');
            exit;
        }
        else{
            Flasher::setFlash('Peranan', 'gagal', 'dirubah', 'danger');
            header('Location: '.BASEURL.'/role');
            exit;
        }
    }

    public function delete($id){
        if( $this->model('Role/RoleModel')->deleteData($id) > 0 ){
            Flasher::setFlash('Peranan', 'berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/role');
            exit;
        }
        else{
            Flasher::setFlash('Peranan', 'gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/role');
            exit;
        }
    }
}