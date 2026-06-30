<?php

require_once "../model/Pegawai.php";

$pegawai = new Pegawai();

/*
==================================
TAMBAH PEGAWAI
==================================
*/
if (isset($_POST['simpan'])) {

    $data = $_POST;

    $namaFoto = "default.png";

    if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {

        $allowed = ['jpg', 'jpeg', 'png'];

        $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            die("Format foto harus JPG, JPEG atau PNG.");
        }

        if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
            die("Ukuran foto maksimal 2 MB.");
        }

        $namaFoto = time() . "." . $ext;

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "../uploads/" . $namaFoto
        );
    }

    $data['foto'] = $namaFoto;

    $pegawai->tambah($data);

header("Location: ../dashboard.php?page=pegawai&success=tambah");  
exit;
}

/*
==================================
EDIT PEGAWAI
==================================
*/
if (isset($_POST['update'])) {

    $data = $_POST;

    $foto = $data['foto_lama'];

    if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {

        $allowed = ['jpg', 'jpeg', 'png'];

        $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            die("Format foto harus JPG, JPEG atau PNG.");
        }

        if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
            die("Ukuran foto maksimal 2 MB.");
        }

        if ($foto != "default.png" && file_exists("../uploads/" . $foto)) {
            unlink("../uploads/" . $foto);
        }

        $foto = time() . "." . $ext;

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "../uploads/" . $foto
        );
    }

    $data['foto'] = $foto;

    $pegawai->update($data);

    header("Location: ../dashboard.php?page=pegawai&success=edit");
    exit;
}

/*
==================================
HAPUS PEGAWAI
==================================
*/
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    $data = $pegawai->getById($id);

    if ($data) {

        if ($data['foto'] != "default.png" && file_exists("../uploads/" . $data['foto'])) {
            unlink("../uploads/" . $data['foto']);
        }

        $pegawai->delete($id);
    }

    header("Location: ../dashboard.php?page=pegawai&success=hapus");
    exit;
}