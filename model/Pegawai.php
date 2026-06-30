<?php

require_once __DIR__ . "/../config/Database.php";

class Pegawai extends Database
{

    // Ambil Semua Data
    public function getAll($keyword = "")
    {
        if ($keyword != "") {

            $stmt = $this->conn->prepare("
                SELECT *
                FROM pegawai
                WHERE
                    nomor_pegawai LIKE ?
                    OR nama_pegawai LIKE ?
                    OR email LIKE ?
                    OR no_telp LIKE ?
                    OR status LIKE ?
                ORDER BY id DESC
            ");

            $search = "%".$keyword."%";

            $stmt->bind_param(
                "sssss",
                $search,
                $search,
                $search,
                $search,
                $search
            );

            $stmt->execute();

            return $stmt->get_result();

        }

        return $this->conn->query("
            SELECT *
            FROM pegawai
            ORDER BY id DESC
        ");
    }

    // Ambil 1 Data
    public function getById($id)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM pegawai
            WHERE id=?
        ");

        $stmt->bind_param("i",$id);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Tambah
    public function tambah($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO pegawai
            (
                nomor_pegawai,
                nama_pegawai,
                email,
                no_telp,
                status,
                tanggal_mendaftar,
                foto
            )

            VALUES
            (
                ?,?,?,?,?,?,?
            )
        ");

        $stmt->bind_param(
            "sssssss",

            $data['nomor_pegawai'],
            $data['nama_pegawai'],
            $data['email'],
            $data['no_telp'],
            $data['status'],
            $data['tanggal_mendaftar'],
            $data['foto']

        );

        return $stmt->execute();
    }

    // Update

    public function update($data)
    {
        $stmt = $this->conn->prepare("
            UPDATE pegawai SET

            nomor_pegawai=?,
            nama_pegawai=?,
            email=?,
            no_telp=?,
            status=?,
            tanggal_mendaftar=?,
            foto=?

            WHERE id=?
        ");

        $stmt->bind_param(
            "sssssssi",

            $data['nomor_pegawai'],
            $data['nama_pegawai'],
            $data['email'],
            $data['no_telp'],
            $data['status'],
            $data['tanggal_mendaftar'],
            $data['foto'],
            $data['id']

        );

        return $stmt->execute();
    }


    // Hapus
    public function delete($id)
    {
        $stmt = $this->conn->prepare("
            DELETE FROM pegawai
            WHERE id=?
        ");

        $stmt->bind_param("i",$id);

        return $stmt->execute();
    }

// Dashboard
public function totalPegawai()
{
    $sql = $this->conn->query("
        SELECT COUNT(*) AS total
        FROM pegawai
    ");

    return $sql->fetch_assoc()['total'];
}

public function totalStatus($status)
{
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) AS total
        FROM pegawai
        WHERE status=?
    ");

    $stmt->bind_param("s", $status);

    $stmt->execute();

    return $stmt->get_result()->fetch_assoc()['total'];
}

public function grafikStatus()
{
    return $this->conn->query("
        SELECT
            status,
            COUNT(*) AS total
        FROM pegawai
        GROUP BY status
        ORDER BY status ASC
    ");
}
    // ==============================
    // Data Terbaru
    // ==============================
    public function terbaru()
    {
        return $this->conn->query("
            SELECT *
            FROM pegawai
            ORDER BY id DESC
            LIMIT 5
        ");
    }

    // ==============================
    // Nomor Pegawai Otomatis
    // ==============================
    public function nomorOtomatis()
    {
        $sql = $this->conn->query("
            SELECT MAX(id) AS id
            FROM pegawai
        ");

        $data = $sql->fetch_assoc();

        $id = $data['id'] + 1;

        return "PGW".str_pad($id,3,"0",STR_PAD_LEFT);
    }

    // ==============================
    // Filter Laporan
    // ==============================
    public function filter($status="", $bulan="", $tahun="")
    {
        $sql = "SELECT * FROM pegawai WHERE 1=1";

        if($status != ""){
            $sql .= " AND status='$status'";
        }

        if($bulan != ""){
            $sql .= " AND MONTH(tanggal_mendaftar)='$bulan'";
        }

        if($tahun != ""){
            $sql .= " AND YEAR(tanggal_mendaftar)='$tahun'";
        }

        $sql .= " ORDER BY id DESC";

        return $this->conn->query($sql);
    }

    }