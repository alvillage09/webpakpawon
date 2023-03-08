<?php

use app\config\Session;
use app\config\Database;
use app\config\Helper;
class LoginModel {

    //untuk inisiasi properti yang digunakan
    private $table ='user'; //sesuaikan dengan nama tabel di db
    private $db, $session;

    public function __construct()
    {
        //inisiasi untuk objek database agar bisa menggunakan queri wraper
        $this->db = new Database;
        $this->session = new Session;
    }

    public function getUser($username,$password,$joinTable)
    {
        //penulisan sintaks untuk query
        $this->db->query('SELECT * FROM '.$this->table.' WHERE user_username=:user_username');
        $this->db->bind('user_username', $username);

        $data= $this->db->resultSingle();

        if($password==$data['user_password'])
        {

            $this->db->query('SELECT '.$this->table.'.'.$this->table.'_username,'
                                .$this->table.'.'.$joinTable.'_id,'
                                .$joinTable.'.'.$joinTable.'_name, '
                                .$joinTable.'.'.$joinTable.'_email, '
                                .$joinTable.'.'.$joinTable.'_gender, '
                                .$joinTable.'.'.$joinTable.'_birth_date, '
                                .$joinTable.'.'.$joinTable.'_phone, '
                                .$joinTable.'.'.$joinTable.'_address 
                                FROM '.$this->table.' 
                                JOIN '.$joinTable.' ON '.$this->table.'.'.$joinTable.'_id = '.$joinTable.'.'.$joinTable.'_id 
                                WHERE '.$this->table.'.user_id = :user_id');
            $this->db->bind('user_id', $data['user_id']);
            $user= $this->db->resultSingle();

            $this->session->setValue('user_id',$data['user_id']);
            $this->session->setValue($joinTable.'_id',$data[$joinTable.'_id']);
            $this->session->setValue('user_username',$user['user_username']);
            $this->session->setValue('user_name',$user[$joinTable.'_name']);
            $this->session->setValue('user_email',$user[$joinTable.'_email']);
            $this->session->setValue('user_gender',$user[$joinTable.'_gender']);
            $this->session->setValue('user_birth_date',$user[$joinTable.'_birth_date']);
            $this->session->setValue('user_phone',$user[$joinTable.'_phone']);
            $this->session->setValue('user_address',$user[$joinTable.'_address']);
            return $user;
        }
        else
        {
            Helper::setFlash('Data', 'identitas pengguna atau kata sandi salah!', '', 'danger');
            return false;
        }

        
    }
}