<?php

require_once "model/Pegawai.php";

$pegawai = new Pegawai();

$keyword = $_GET['keyword'] ?? "";

$data = $pegawai->getAll($keyword);

// Statistik
$totalPegawai = $pegawai->totalPegawai();
$totalTetap = $pegawai->totalStatus("Tetap");
$totalKontrak = $pegawai->totalStatus("Kontrak");
$totalMagang = $pegawai->totalStatus("Magang");

?>
<div class="row mb-4">

    <div class="col-md-3">
        <div class="card stat-card text-center">
            <div class="card-body">
                <i class="bi bi-people-fill fs-1" style="color:#575527;"></i>
                <h3><?= $totalPegawai ?></h3>
                <small>Total Pegawai</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card text-center">
            <div class="card-body">
                <i class="bi bi-person-check-fill fs-1" style="color:#928E5E;"></i>
                <h3><?= $totalTetap ?></h3>
                <small>Pegawai Tetap</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card text-center">
            <div class="card-body">
                <i class="bi bi-person-workspace fs-1" style="color:#B97D7B;"></i>
                <h3><?= $totalKontrak ?></h3>
                <small>Pegawai Kontrak</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card text-center">
            <div class="card-body">
                <i class="bi bi-mortarboard-fill fs-1" style="color:#ECC4C3;"></i>
                <h3><?= $totalMagang ?></h3>
                <small>Pegawai Magang</small>
            </div>
        </div>
    </div>

</div>
<div class="card shadow">

    <div class="card-header custom-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            <i class="bi bi-people-fill"></i>
            Data Pegawai
        </h4>

        <div>

            <a href="dashboard.php?page=tambah" class="btn btn-theme">
                <i class="bi bi-plus-circle"></i>
                Tambah Pegawai
            </a>

            <a href="controller/ReportController.php?keyword=<?= $keyword ?>" class="btn btn-pdf">
                <i class="bi bi-file-earmark-pdf"></i>
                PDF
            </a>

            <a href="controller/ExcelController.php?keyword=<?= $keyword ?>" class="btn btn-excel">
                <i class="bi bi-file-earmark-excel"></i>
                Excel
            </a>

        </div>

    </div>

    <div class="card-body">

        <form method="GET">

            <input type="hidden" name="page" value="pegawai">

            <div class="row mb-3">

                <div class="col-md-8">

                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Cari nama, email, atau nomor pegawai..."
                        value="<?= $keyword ?>">

                </div>

                <div class="col-md-4">

                    <button class="btn btn-theme">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                    <a href="dashboard.php?page=pegawai" class="btn btn-secondary">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </a>

                </div>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle" id="tabelPegawai">

                <thead class="table-theme">

                    <tr>

                        <th width="60">No</th>

                        <th width="80">Foto</th>

                        <th>Nomor Pegawai</th>

                        <th>Nama Pegawai</th>

                        <th>Email</th>

                        <th>No. Telepon</th>

                        <th>Status</th>

                        <th>Tanggal Daftar</th>

                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    while($row = $data->fetch_assoc()){
                    ?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td class="text-center">

                            <img
                                src="uploads/<?= $row['foto']; ?>"
                                width="55"
                                height="55"
                                class="rounded-circle border"
                                style="object-fit:cover;">

                        </td>

                        <td><?= $row['nomor_pegawai']; ?></td>

                        <td><?= $row['nama_pegawai']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td><?= $row['no_telp']; ?></td>

                        <td>

                            <?php

                            if($row['status']=="Tetap"){

                                echo "<span class='badge badge-tetap'>Tetap</span>";

                            }elseif($row['status']=="Kontrak"){

                                echo "<span class='badge badge-kontrak'>Kontrak</span>";

                            }else{

                                echo "<span class='badge badge-magang'>Magang</span>";

                            }

                            ?>

                        </td>

                        <td>

                            <?= date('d-m-Y',strtotime($row['tanggal_mendaftar'])) ?>

                        </td>

                        <td>

                            <a
                                href="dashboard.php?page=detail&id=<?= $row['id']; ?>"
                                class="btn btn-detail btn-sm"
                                title="Detail">

                                <i class="bi bi-eye-fill"></i>

                            </a>

                            <a
                                href="dashboard.php?page=edit&id=<?= $row['id']; ?>"
                                class="btn btn-edit btn-sm"
                                title="Edit">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <a
                                href="#"
                                onclick="hapus('controller/PegawaiController.php?hapus=<?= $row['id']; ?>')"
                                class="btn btn-delete btn-sm"
                                title="Hapus">

                                <i class="bi bi-trash-fill"></i>

                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>