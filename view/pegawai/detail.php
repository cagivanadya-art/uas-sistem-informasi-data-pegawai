<?php

require_once "model/Pegawai.php";

$pegawai = new Pegawai();

$data = $pegawai->getById($_GET['id']);

?>

<div class="card shadow">

    <div class="card-header custom-header">

        <h4 class="mb-0">

            <i class="bi bi-person-vcard-fill"></i>

            Detail Data Pegawai

        </h4>

    </div>

    <div class="card-body">

        <div class="row">

            <!-- FOTO -->

            <div class="col-md-4 text-center">

                <img
                src="uploads/<?= $data['foto']; ?>"
                class="img-thumbnail rounded-circle shadow"
                width="220"
                height="220"
                style="object-fit:cover;">

                <h4 class="mt-3">

                    <?= $data['nama_pegawai']; ?>

                </h4>

                <?php

                if($data['status']=="Tetap"){

                    echo "<span class='badge badge-tetap'>Pegawai Tetap</span>";

                }elseif($data['status']=="Kontrak"){

                    echo "<span class='badge badge-kontrak'>Pegawai Kontrak</span>";

                }else{

                    echo "<span class='badge badge-magang'>Pegawai Magang</span>";

                }

                ?>

            </div>

            <!-- DATA -->

            <div class="col-md-8">

                <table class="table table-borderless">

                    <tr>

                        <th width="220">Nomor Pegawai</th>

                        <td>: <?= $data['nomor_pegawai']; ?></td>

                    </tr>

                    <tr>

                        <th>Nama Pegawai</th>

                        <td>: <?= $data['nama_pegawai']; ?></td>

                    </tr>

                    <tr>

                        <th>Email</th>

                        <td>: <?= $data['email']; ?></td>

                    </tr>

                    <tr>

                        <th>No. Telepon</th>

                        <td>: <?= $data['no_telp']; ?></td>

                    </tr>

                    <tr>

                        <th>Status</th>

                        <td>: <?= $data['status']; ?></td>

                    </tr>

                    <tr>

                        <th>Tanggal Masuk</th>

                        <td>: <?= date('d F Y',strtotime($data['tanggal_mendaftar'])); ?></td>

                    </tr>

                </table>

            </div>

        </div>

        <hr>

        <a
        href="dashboard.php?page=pegawai"
        class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

        <a
        href="dashboard.php?page=edit&id=<?= $data['id']; ?>"
        class="btn btn-theme">

            <i class="bi bi-pencil-square"></i>

            Edit Data

        </a>

    </div>

</div>