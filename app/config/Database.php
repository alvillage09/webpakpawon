<?php
namespace app\config;

use PDO, PDOException;
class Database {
    //mendefinisikan properti untuk koneksi
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host='. $this->host .';dbname='.$this->db_name;

        //memberikan opsi untuk coneksi db
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        //exception db
        try {
            //melakukan koneksi db
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            //menampilkan pesan error koneksi
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        //perintah untuk menuliskan query
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        //binding tipe data query
        if(is_null($type)){
            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        //menjalankan bind data param
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        //eksekusi query
        $this->stmt->execute();
    }

    public function resultSet()
    {
        //eksekusi queri dan menampilkan semua data query
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function resultSingle()
    {
        //eksekusi queri dan menampilkan data query yang hanya sesuai queri
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function count()
    {
        return $this->stmt->rowCount();
    }
}