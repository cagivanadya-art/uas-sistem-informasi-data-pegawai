<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location:view/auth/login.php");
    exit;
}

$page = $_GET['page'] ?? "home";

?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi Data Pegawai</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

<style>

:root{
    --dark:#443025;
    --brown:#7F5836;
    --milk:#AA7F66;
    --pink:#EC9C9D;
    --rose:#F2CFD2;
    --white:#FFF9F8;
}

/* BODY */

body{
    background:var(--rose);
    font-family:'Segoe UI',sans-serif;
}

/* SIDEBAR */

.sidebar{
    background:linear-gradient(180deg,#443025,#5B4030);
    min-height:100vh;
    box-shadow:5px 0 20px rgba(0,0,0,.12);
}
.sidebar h4{
    color:#F8D9D8;
    font-weight:bold;
}
.sidebar p{
    color:#f7e7e7;
}

.sidebar a{

    display:block;
    color:#fff;
    text-decoration:none;
    padding:13px 18px;
    margin-bottom:10px;
    border-radius:14px;
    transition:.3s;

}
.sidebar a:hover{

    background:#EC9C9D;
    color:#443025;
    transform:translateX(6px);

}

/* NAVBAR */

.navbar{

    background:white!important;
    border-radius:0 0 20px 20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
    padding:18px 30px;

}
.navbar-brand{

    font-size:24px;
    color:#443025!important;
    font-weight:bold;

}

/* CARD */

.card{

    border:none;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.08);

}
.custom-header{

    background:#AA7F66!important;
    color:white;

}

/* BUTTON */

.btn{

    border-radius:10px;
    padding:8px 18px;

}
.btn-theme{

    background:#EC9C9D;
    color:white;
    border:none;

}
.btn-theme:hover{

    background:#D9898A;
    color:white;

}
.btn-pdf{

    background:#443025;
    color:white;

}
.btn-pdf:hover{

    background:#2F1F17;
    color:white;

}
.btn-excel{

    background:#7F5836;
    color:white;

}
.btn-excel:hover{

    background:#654528;
    color:white;

}
.btn-detail{

    background:#F2CFD2;
    color:#443025;

}
.btn-edit{

    background:#AA7F66;
    color:white;

}
.btn-delete{

    background:#EC9C9D;
    color:white;

}

/* TABLE */

.table{

    border-radius:15px;
    overflow:hidden;

}
.table-theme th{

    background:#AA7F66!important;
    color:white!important;

}
.table tbody tr:hover{

    background:#FFF4F4;
}

/* FORM */

.form-control{

    border-radius:10px;
}
.form-control:focus{

    border-color:#EC9C9D;
    box-shadow:0 0 8px rgba(236,156,157,.3);
}

/* BADGE */

.badge{

    padding:8px 12px;
    border-radius:20px;
}
.badge-tetap{

    background:#7F5836;
}
.badge-kontrak{

    background:#AA7F66;
}
.badge-magang{

    background:#EC9C9D;
}

/* STAT CARD */

.stat-card{

    transition:.3s;
}
.stat-card:hover{

    transform:translateY(-6px);
}
.form-label{

    font-weight:600;
    color:#443025;
}
.card-header h4{

    margin:0;
}
.btn-secondary{

    background:#7F5836;
    border:none;
}
.btn-secondary:hover{

    background:#5F4129;
}
.table-borderless th{

    color:#443025;
    font-weight:600;
}
.table-borderless td{

    color:#555;
}
.img-thumbnail{

    border:5px solid #EC9C9D;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{

    background:#EC9C9D !important;
    border:none !important;
    color:white !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover{

    background:#AA7F66 !important;
    color:white !important;
}
.dataTables_filter input{

    border-radius:10px !important;
}
.dataTables_length select{

    border-radius:10px !important;
}
footer{

color:#666;
font-size:14px;
}
.card{

transition:.35s;
}

.card:hover{

transform:translateY(-5px);
box-shadow:0 20px 35px rgba(0,0,0,.12);
}
.sidebar a.active{

background:#EC9C9D;
color:#443025;
font-weight:bold;
}
.btn{
transition:.25s;
}
.btn:hover{
transform:scale(1.05);

}
.form-control{
height:46px;

}
.badge{

font-size:13px;
padding:8px 15px;
}

::-webkit-scrollbar{
width:10px;

}

::-webkit-scrollbar-track{
background:#F2CFD2;

}

::-webkit-scrollbar-thumb{

background:#AA7F66;
border-radius:20px;

}

::-webkit-scrollbar-thumb:hover{

background:#7F5836;
}

</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-2 sidebar p-3">
<h4 class="text-center">
<i class="bi bi-buildings-fill fs-1"></i>

<br>
SIMPEG
</h4>
<p class="text-center small">
Sistem Informasi Data Pegawai
</p>
<hr class="text-white">

<a href="dashboard.php"
class="<?= ($page=="home")?'active':''; ?>">
<i class="bi bi-speedometer2"></i>

Dashboard

</a>
<a href="dashboard.php?page=pegawai"
class="<?=($page=="pegawai")?'active':'';?>">
<i class="bi bi-people-fill"></i>
Data Pegawai
</a>

<a href="dashboard.php?page=tambah"
class="<?= ($page=="tambah")?'active':''; ?>">
<i class="bi bi-person-plus-fill"></i>
Tambah Pegawai
</a>

<a href="dashboard.php?page=laporan"
class="<?= ($page=="laporan")?'active':''; ?>">
<i class="bi bi-file-earmark-text-fill"></i>
Laporan
</a>

<a href="logout.php">
<i class="bi bi-box-arrow-right"></i>
Logout
</a>

</div>

<div class="col-md-10">
<nav class="navbar d-flex justify-content-between align-items-center">
<span class="navbar-brand">
<i class="bi bi-buildings-fill"></i>

SIMPEG

</span>

<div>
<div class="d-flex align-items-center">
    <i class="bi bi-person-circle fs-4 me-2"></i>
    <strong><?= $_SESSION['nama']; ?></strong>
</div>

</nav>
<div class="p-4">

<?php

switch($page){
case "pegawai":
include "view/pegawai/index.php";
break;
case "tambah":
include "view/pegawai/tambah.php";
break;
case "edit":
include "view/pegawai/edit.php";
break;
case "detail":
include "view/pegawai/detail.php";
break;
case "laporan":
include "view/laporan/index.php";
break;
default:
include "view/dashboard/home.php";
break;
}

?>

</div>
<footer class="text-center py-3 mt-4">

© <?= date('Y'); ?>

SIMPEG |

Sistem Informasi Data Pegawai
</footer>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(function(){
$('#tabelPegawai').DataTable({
pageLength:10
});
});

function hapus(url){
Swal.fire({
title:'Hapus data?',
text:'Data yang dihapus tidak dapat dikembalikan.',
icon:'warning',
showCancelButton:true,
confirmButtonColor:'#dc3545',
cancelButtonText:'Batal',
confirmButtonText:'Ya, Hapus'
}).then((result)=>{
if(result.isConfirmed){
window.location=url;
}
});
}

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
if(isset($_SESSION['success'])){

?>

<script>
document.addEventListener("DOMContentLoaded",()=>{
Swal.fire({
    title:'Hapus data?',
    text:'Data yang dihapus tidak dapat dikembalikan.',
    icon:'warning',
    showCancelButton:true,
    confirmButtonColor:'#EC9C9D',
    cancelButtonColor:'#7F5836'
    cancelButtonText:'Batal',
    confirmButtonText:'Ya, Hapus'
})
});

</script>

<?php
unset($_SESSION['success']);
}
?>
</body>

</html>