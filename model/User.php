<?php

require_once __DIR__ . "/../config/Database.php";

class User extends Database
{
    public function login($username)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM users
            WHERE username=?
            LIMIT 1
        ");

        $stmt->bind_param("s", $username);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function register($nama, $username, $password)
    {
        // Cek username sudah ada atau belum
        $cek = $this->conn->prepare("
            SELECT id
            FROM users
            WHERE username=?
        ");

        $cek->bind_param("s", $username);
        $cek->execute();

        if ($cek->get_result()->num_rows > 0) {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("
            INSERT INTO users
            (
                nama,
                username,
                password
            )
            VALUES
            (
                ?,?,?
            )
        ");

        $stmt->bind_param(
            "sss",
            $nama,
            $username,
            $hash
        );

        return $stmt->execute();
    }
}