<?php

namespace app\src\Home;

use app\config\Database;

class HomeModel {

    //untuk inisiasi properti yang digunakan
    private $table ='user'; //sesuaikan dengan nama tabel di db
    private $db;

    public function __construct()
    {
        //inisiasi untuk objek database agar bisa menggunakan queri wraper
        $this->db = new Database;
    }

    public function getAll()
    {
        //penulisan sintaks untuk query
        $this->db->query('SELECT * FROM '.$this->table);

        //mengembalikan hasil query (semua data)
        return $this->db->resultSet();
    }
}