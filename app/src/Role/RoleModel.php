<?php
use app\config\Database;
class RoleModel {

    //untuk inisiasi properti yang digunakan
    private $table ='role'; //sesuaikan dengan nama tabel di db
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
    public function storeData($data)
    {
        //penulisan sintaks untuk query
        $query = "INSERT INTO ".$this->table.
                    " VALUES 
                    ('', :role_name, :role_desc)";
        //input qery
        $this->db->query($query);
        $this->db->bind('role_name',$data['role_name']);
        $this->db->bind('role_desc',$data['role_desc']);

        $this->db->execute();

        return $this->db->count();

    }
    public function updateData($data)
    {
        //penulisan sintaks untuk query
        $query = "UPDATE ".$this->table." SET
                        role_name = :role_name,
                        role_desc = :role_desc
                        WHERE role_id = :role_id";
        //input qery
        $this->db->query($query);
        $this->db->bind('role_id',$data['role_id']);
        $this->db->bind('role_name',$data['role_name']);
        $this->db->bind('role_desc',$data['role_desc']);

        $this->db->execute();

        return $this->db->count();

    }

    public function deleteData($id)
    {
        //penulisan sintaks untuk query
        $query = "DELETE FROM ".$this->table." WHERE ".$this->table."_id = :role_id";
        //input qery
        $this->db->query($query);
        $this->db->bind('role_id',$id);

        $this->db->execute();

        return $this->db->count();

    }
}