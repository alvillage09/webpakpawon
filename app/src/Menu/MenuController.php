<?php

namespace app\src\Menu;

use app\config\Controller;
use app\config\Flasher;
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
            
            $data['dataMenu'] = $this->model('Menu/MenuModel')->getAll();
            $this->viewCMS('Menu/MenuIndexViewCMS',$data);
        }
        else{
            //memparsing data ke halaman view front page
            $this->viewFrontPage('Menu/MenuIndexViewFrontPage',$data);
        }
    }

    public function store(){
        var_dump($_POST);
        // if( $this->model('Menu/MenuModel')->storeData($_POST) > 0 ){
        //     Flasher::setFlash('Peranan', 'berhasil', 'ditambahkan', 'success');
        //     header('Location: '.BASEURL.'/menu');
        //     exit;
        // }
        // else{
        //     Flasher::setFlash('Peranan', 'gagal', 'ditambahkan', 'danger');
        //     header('Location: '.BASEURL.'/menu');
        //     exit;
        // }
    }

    public function update($id){
        if( $this->model('Menu/MenuModel')->updateData($_POST) > 0 ){
            Flasher::setFlash('Peranan', 'berhasil', 'dirubah', 'success');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
        else{
            Flasher::setFlash('Peranan', 'gagal', 'dirubah', 'danger');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
    }

    public function delete($id){
        if( $this->model('Menu/MenuModel')->deleteData($id) > 0 ){
            Flasher::setFlash('Peranan', 'berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
        else{
            Flasher::setFlash('Peranan', 'gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
    }
}