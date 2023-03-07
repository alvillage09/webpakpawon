<?php
use app\config\Database;
class MenuModel {

    //untuk inisiasi properti yang digunakan
    private $table ='menu'; //sesuaikan dengan nama tabel di db
    private $db;

    public function __construct()
    {
        //inisiasi untuk objek database agar bisa menggunakan queri wraper
        $this->db = new Database;
    }

    public function getAll()
    {
        //penulisan sintaks untuk query
        $query = "SELECT * FROM ".$this->table;

        //input qery
        $this->db->query($query);

        //mengembalikan hasil query (semua data)
        return $this->db->resultSet();
    }
    // public function storeData($data)
    // {
    //     //penulisan sintaks untuk query
    //     $query = "INSERT INTO ".$this->table.
    //                 " VALUES 
    //                 ('', :menu_name, :menu_desc)";
    //     //input qery
    //     $this->db->query($query);
    //     $this->db->bind('menu_name',$data['menu_name']);
    //     $this->db->bind('menu_desc',$data['menu_desc']);

    //     $this->db->execute();

    //     return $this->db->count();

    // }
    // public function updateData($data)
    // {
    //     //penulisan sintaks untuk query
    //     $query = "UPDATE ".$this->table." SET
    //                     menu_name = :menu_name,
    //                     menu_desc = :menu_desc
    //                     WHERE menu_id = :menu_id";
    //     //input qery
    //     $this->db->query($query);
    //     $this->db->bind('menu_id',$data['menu_id']);
    //     $this->db->bind('menu_name',$data['menu_name']);
    //     $this->db->bind('menu_desc',$data['menu_desc']);

    //     $this->db->execute();

    //     return $this->db->count();

    // }

    // public function deleteData($id)
    // {
    //     //penulisan sintaks untuk query
    //     $query = "DELETE FROM ".$this->table." WHERE ".$this->table."_id = :menu_id";
    //     //input qery
    //     $this->db->query($query);
    //     $this->db->bind('menu_id',$id);

    //     $this->db->execute();

    //     return $this->db->count();

    // }
}