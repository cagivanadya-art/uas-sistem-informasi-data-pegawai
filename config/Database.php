<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "uas_251011700427_data_pegawai";

    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );

        if ($this->conn->connect_error) {
            die("Koneksi Database Gagal : " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8");
    }
}