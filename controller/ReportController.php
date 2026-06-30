<?php

require_once "../model/Pegawai.php";

require_once "../vendor/fpdf/fpdf.php";

$model=new Pegawai();

$keyword=$_GET['keyword']??"";

$data=$model->getAll($keyword);

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',14);

$pdf->Cell(190,10,'Laporan Data Pegawai',0,1,'C');

$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,10,'No',1);

$pdf->Cell(30,10,'No Pegawai',1);

$pdf->Cell(45,10,'Nama',1);

$pdf->Cell(45,10,'Email',1);

$pdf->Cell(25,10,'Status',1);

$pdf->Cell(35,10,'Tanggal',1);

$pdf->Ln();

$pdf->SetFont('Arial','',10);

$no=1;

while($row=$data->fetch_assoc()){

$pdf->Cell(10,10,$no++,1);

$pdf->Cell(30,10,$row['nomor_pegawai'],1);

$pdf->Cell(45,10,$row['nama_pegawai'],1);

$pdf->Cell(45,10,$row['email'],1);

$pdf->Cell(25,10,$row['status'],1);

$pdf->Cell(35,10,$row['tanggal_mendaftar'],1);

$pdf->Ln();

}

$pdf->Output();

?>