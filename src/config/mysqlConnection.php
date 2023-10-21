<?php

namespace src\config;

class MysqlConnection
{
    // private function untuk kegunaan di dalam class ini saja
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ratih_blog";

    // public function untuk kegunaan global dimana saja
    public $connection;


    public function __construct()
    {
        // call function databaseConnection
        $this->databaseConnection();
    }

    // fungsi koneksi database
    private function databaseConnection()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $this->connection = $conn;
    }
}
