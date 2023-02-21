<?php
class App {
    protected $folder = 'Home';
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        //ini melihat controller
        if( isset($url) ){
            if(file_exists('../app/src/'.$url[0].'/'.$url[0].'Controller.php')){
                $this->folder = ucwords($url[0]);
                $this->controller = ucwords($url[0]).'Controller';
                unset($url[0]);
            }
        }
        
        require_once '../app/src/'.$this->folder.'/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //untuk mengecek method
        if( isset($url[1]) ){
            if( method_exists($this->controller, $url[1]) ){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //param
        if( !empty($url) ) {
            $this->params = array_values($url);
        }

        //jalankan controller dan methods dan kirim param jika ada
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    //fungsi untuk parshing url ke array
    public function parseURL()
    {
        if(isset($_GET['url'])){
            //mengambil dan menghilangkan karakte / diakhir url
            $url = rtrim($_GET['url'], '/');

            //untuk membersihkan karakter aneh di url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //untuk memisahkan url menjadi array
            $url = explode('/',$url);
            return $url;
        }
    }
}