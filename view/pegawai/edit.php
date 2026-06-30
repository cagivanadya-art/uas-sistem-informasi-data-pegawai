<?php

require_once "model/Pegawai.php";

$pegawai = new Pegawai();

$data = $pegawai->getById($_GET['id']);

?>

<div class="card shadow">

    <div class="card-header custom-header">

        <h4 class="mb-0">

            <i class="bi bi-pencil-square"></i>

            Edit Data Pegawai

        </h4>

    </div>

    <div class="card-body">

        <form
        action="controller/PegawaiController.php"
        method="POST"
        enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

        <div class="row">

            <!-- KIRI -->

            <div class="col-md-8">

                <div class="mb-3">

                    <label class="form-label">Nomor Pegawai</label>

                    <input
                    type="text"
                    name="nomor_pegawai"
                    class="form-control"
                    value="<?= $data['nomor_pegawai']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Nama Pegawai</label>

                    <input
                    type="text"
                    name="nama_pegawai"
                    class="form-control"
                    value="<?= $data['nama_pegawai']; ?>"
                    required>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?= $data['email']; ?>"
                            required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>No Telepon</label>

                            <input
                            type="text"
                            name="no_telp"
                            class="form-control"
                            value="<?= $data['no_telp']; ?>"
                            required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Status</label>

                            <select
                            name="status"
                            class="form-select"
                            required>

                                <option value="Tetap" <?= ($data['status']=="Tetap")?"selected":""; ?>>
                                    Tetap
                                </option>

                                <option value="Kontrak" <?= ($data['status']=="Kontrak")?"selected":""; ?>>
                                    Kontrak
                                </option>

                                <option value="Magang" <?= ($data['status']=="Magang")?"selected":""; ?>>
                                    Magang
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Tanggal Masuk</label>

                            <input
                            type="date"
                            name="tanggal_mendaftar"
                            class="form-control"
                            value="<?= $data['tanggal_mendaftar']; ?>"
                            required>

                        </div>

                    </div>

                </div>

            </div>

            <!-- KANAN -->

            <div class="col-md-4">

                <div class="text-center">

                    <img
                    src="uploads/<?= $data['foto']; ?>"
                    id="preview"
                    class="img-thumbnail rounded-circle mb-3"
                    width="200"
                    height="200"
                    style="object-fit:cover;">

                    <input
                    type="file"
                    name="foto"
                    class="form-control"
                    accept="image/*"
                    onchange="previewFoto(event)">

                    <small class="text-muted d-block mt-2">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                </div>

            </div>

        </div>

        <hr>

        <button
        type="submit"
        name="update"
        class="btn btn-theme">

            <i class="bi bi-save-fill"></i>

            Update

        </button>

        <a
        href="dashboard.php?page=pegawai"
        class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

        </form>

    </div>

</div>

<script>

function previewFoto(event){

    const reader = new FileReader();

    reader.onload = function(){

        document.getElementById("preview").src = reader.result;

    }

    reader.readAsDataURL(event.target.files[0]);

}

</script>