<?php

require_once "model/Pegawai.php";

$pegawai = new Pegawai();

$status = $_GET['status'] ?? "";
$bulan  = $_GET['bulan'] ?? "";
$tahun  = $_GET['tahun'] ?? "";

$data = $pegawai->filter($status, $bulan, $tahun);

?>

<div class="card shadow">

    <div class="card-header custom-header">

        <h4>
            <i class="bi bi-file-earmark-bar-graph"></i>
            Laporan Data Pegawai
        </h4>

    </div>

    <div class="card-body">

        <form method="GET">

            <input type="hidden" name="page" value="laporan">

            <div class="row">

                <div class="col-md-3">

                    <label>Status</label>

                    <select name="status" class="form-select">

                        <option value="">Semua</option>

                        <option value="Tetap" <?= $status=="Tetap"?"selected":"" ?>>Tetap</option>

                        <option value="Kontrak" <?= $status=="Kontrak"?"selected":"" ?>>Kontrak</option>

                        <option value="Magang" <?= $status=="Magang"?"selected":"" ?>>Magang</option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Bulan</label>

                    <select name="bulan" class="form-select">

                        <option value="">Semua</option>

                        <?php
                        for($i=1;$i<=12;$i++){
                        ?>

                        <option value="<?= $i ?>" <?= $bulan==$i?"selected":"" ?>>
                            <?= date("F", mktime(0,0,0,$i,1)) ?>
                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="col-md-2">

                    <label>Tahun</label>

                    <select name="tahun" class="form-select">

                        <option value="">Semua</option>

                        <?php
                        for($i=date('Y');$i>=2023;$i--){
                        ?>

                        <option value="<?= $i ?>" <?= $tahun==$i?"selected":"" ?>>
                            <?= $i ?>
                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="col-md-4 d-flex align-items-end">

                    <button class="btn btn-theme me-2">
                        <i class="bi bi-search"></i>
                        Filter
                    </button>
                    <a href="dashboard.php?page=laporan" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-clockwise"></i>
                    Reset
                    </a>
                    <a href="controller/ReportController.php?status=<?= $status ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>"
                       class="btn btn-pdf me-2">
                        <i class="bi bi-file-earmark-pdf"></i>
                        PDF
                    </a>

                    <a href="controller/ExcelController.php?status=<?= $status ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>"
                        class="btn btn-excel">
                        <i class="bi bi-file-earmark-excel"></i>
                        Excel
                    </a>

                </div>

            </div>

        </form>

        <hr>

        <table class="table table-bordered table-hover" id="tabelPegawai">

            <thead class="table-theme">

                <tr>

                    <th>No</th>

                    <th>Nomor Pegawai</th>

                    <th>Nama</th>

                    <th>Email</th>

                    <th>Telepon</th>

                    <th>Status</th>

                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

            <?php

            $no=1;

            while($row=$data->fetch_assoc()){

            ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $row['nomor_pegawai'] ?></td>

                <td><?= $row['nama_pegawai'] ?></td>

                <td><?= $row['email'] ?></td>

                <td><?= $row['no_telp'] ?></td>

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

                <td><?= date('d-m-Y',strtotime($row['tanggal_mendaftar'])) ?></td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>