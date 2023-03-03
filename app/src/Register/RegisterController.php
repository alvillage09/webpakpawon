<?php
namespace app\src\Register;
use app\config\Controller;
class RegisterController extends Controller{
    
    public function index()
    {
        $data['title'] = 'Register';


        $this->view('template/cms/header',$data);
        $this->view('Register/RegisterView',$data);
        $this->view('template/cms/scriptDefault');
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