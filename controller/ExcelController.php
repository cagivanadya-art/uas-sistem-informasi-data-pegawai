<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../model/Pegawai.php";

$pegawai = new Pegawai();

$status = $_GET['status'] ?? "";
$bulan  = $_GET['bulan'] ?? "";
$tahun  = $_GET['tahun'] ?? "";

$data = $pegawai->filter($status, $bulan, $tahun);

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Data_Pegawai.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border='1'>";

echo "
<tr>
    <th>No</th>
    <th>Nomor Pegawai</th>
    <th>Nama Pegawai</th>
    <th>Email</th>
    <th>No Telepon</th>
    <th>Status</th>
    <th>Tanggal Mendaftar</th>
</tr>";

$no = 1;

while($row = $data->fetch_assoc()){

    echo "<tr>";

    echo "<td>".$no++."</td>";

    echo "<td>".$row['nomor_pegawai']."</td>";

    echo "<td>".$row['nama_pegawai']."</td>";

    echo "<td>".$row['email']."</td>";

    echo "<td>".$row['no_telp']."</td>";

    echo "<td>".$row['status']."</td>";

    echo "<td>".date('d-m-Y', strtotime($row['tanggal_mendaftar']))."</td>";

    echo "</tr>";

}

echo "</table>";

exit;