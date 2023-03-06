<?php

use app\config\Session;
use app\config\Database;
class RegisterModel {

    //untuk inisiasi properti yang digunakan
    private $table ='user'; //sesuaikan dengan nama tabel di db
    private $db, $session;

    public function __construct()
    {
        //inisiasi untuk objek database agar bisa menggunakan queri wraper
        $this->db = new Database;
        $this->session = new Session;
    }

    public function storeData($data)
    {
        //penulisan sintaks untuk query
        
    }
}