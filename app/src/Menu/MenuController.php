<?php

namespace app\src\Menu;

use app\config\Controller;
use app\config\Helper;
use app\config\Session;
class MenuController extends Controller{

    protected $session,$helper;

    public function __construct()
    {
        $this->session = new Session; 
        $this->helper = new Helper; 
    }
    
    public function index()
    {
        //mengambil data dari db dengan menggunakan model
        $data['title'] = 'Menu';
        if(array_key_exists('employee_id', $_SESSION)){
            
            $data['script'] = 'Menu/MenuScript';
            $data['dataMenu'] = $this->model('Menu/MenuModel')->getAll();
            $this->viewCMS('Menu/MenuIndexViewCMS',$data);
        }
        else{
            //memparsing data ke halaman view front page
            $this->viewFrontPage('Menu/MenuIndexViewFrontPage',$data);
        }
    }

    public function store(){

        $data['menu_name']=$_POST['menu_name'];
        $data['menu_stock']=$_POST['menu_stock'];
        $data['menu_price']=$_POST['menu_price'];
        $data['menu_desc']=$_POST['menu_desc'];
        $data['menu_image'] = $this->helper->uploadImage('menu_image');

        if (!$data['menu_image']) {
            Helper::setFlash('',$data['menu_image']['messege'], '', 'danger');
            header('Location: '.BASEURL.'/menu');
            exit;
        }

        if( $this->model('Menu/MenuModel')->storeData($data) > 0 ){
            Helper::setFlash('Data menu', 'berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
        else{
            Helper::setFlash('Data menu', 'gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
    }

    public function update($id){
        $data['menu_id']=$_POST['menu_id'];
        $data['menu_name']=$_POST['menu_name'];
        $data['menu_stock']=$_POST['menu_stock'];
        $data['menu_price']=$_POST['menu_price'];
        $data['menu_desc']=$_POST['menu_desc'];

        if (!$_FILES) {
            $data['menu_image'] = $_POST['current_menu_img'];
        }else{
            $data['menu_image'] = $this->helper->uploadImage('menu_image');

            if (!$data['menu_image']) {
                Helper::setFlash('',$data['menu_image']['messege'], '', 'danger');
                header('Location: '.BASEURL.'/menu');
                exit;
            }
        }


        if( $this->model('Menu/MenuModel')->updateData($data) > 0 ){
            Helper::setFlash('Peranan', 'berhasil', 'dirubah', 'success');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
        else{
            Helper::setFlash('Peranan', 'gagal', 'dirubah', 'danger');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
    }

    public function delete($id){
        if( $this->model('Menu/MenuModel')->deleteData($id) > 0 ){
            Helper::setFlash('Data menu', 'berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
        else{
            Helper::setFlash('Data menu', 'gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/menu');
            exit;
        }
    }
}