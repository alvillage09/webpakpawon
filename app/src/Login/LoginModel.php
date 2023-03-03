<?php

namespace app\src\Home;

use app\config\Database;

class LoginModel {

    //untuk inisiasi properti yang digunakan
    private $table ='user'; //sesuaikan dengan nama tabel di db
    private $db, $session;

    public function __construct()
    {
        //inisiasi untuk objek database agar bisa menggunakan queri wraper
        $this->db = new Database;
        // $this->session = new Session;
    }

    public function getUser($username,$password)
    {
        //penulisan sintaks untuk query
        $this->db->query('SELECT * FROM '.$this->table.' WHERE user_username=:user_username');
        $this->db->bind('user_username', $username);

        $data= $this->db->resultSingle();

        if($password==$data['user_password'])
        {
            return $data;
        }
        else
        {
            // $this->session->start();
            session_start();
            $_SESSION['error'] = true;
            return false;
        }

        
    }
}