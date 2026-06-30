<?php
session_start();

if(isset($_SESSION['login'])){
    header("Location: ../../dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Register | Sistem Informasi Data Pegawai</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#F2CFD2;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Segoe UI',sans-serif;
}

.card{
    width:450px;
    border:none;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}

.card-body{
    padding:35px;
}

.logo{
    font-size:60px;
    color:#AA7F66;
}

h3{
    color:#443025;
    font-weight:bold;
}

.text-muted{
    color:#7F5836 !important;
}

.form-label,
label{
    color:#443025;
    font-weight:600;
}

.form-control{
    height:46px;
    border-radius:10px;
}

.form-control:focus{
    border-color:#EC9C9D;
    box-shadow:0 0 8px rgba(236,156,157,.3);
}

.btn-theme{
    background:#EC9C9D;
    color:white;
    border:none;
    border-radius:10px;
    height:46px;
}

.btn-theme:hover{
    background:#D9898A;
    color:white;
}

.btn-outline-theme{
    border:2px solid #AA7F66;
    color:#AA7F66;
    border-radius:10px;
}

.btn-outline-theme:hover{
    background:#AA7F66;
    color:white;
}
</style>

</head>

<body>

<div class="card shadow">

<div class="card-body p-4">

<div class="text-center">

<i class="bi bi-person-plus-fill logo"></i>

<h3>Registrasi Admin</h3>

<p class="text-muted">Buat akun administrator baru</p>

</div>

<form action="../../controller/AuthController.php" method="POST">

<div class="mb-3">

<label>Nama Lengkap</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<div class="input-group">

<input
type="password"
name="password"
id="password"
class="form-control"
required>

<button
type="button"
class="btn btn-outline-secondary"
onclick="lihatPassword()">

<i id="icon" class="bi bi-eye"></i>

</button>

</div>

</div>

<div class="d-grid">

<button
name="register"
class="btn btn-theme">

<i class="bi bi-person-check-fill"></i>

Daftar

</button>

</div>

<div class="text-center mt-3">

Sudah punya akun?

<a href="login.php" class="btn btn-outline-theme mt-2">
    <i class="bi bi-box-arrow-in-right"></i>
    Login
</a>

</div>

</form>

</div>

</div>

<script>

function lihatPassword(){

let pass=document.getElementById("password");

let icon=document.getElementById("icon");

if(pass.type=="password"){

pass.type="text";

icon.className="bi bi-eye-slash";

}else{

pass.type="password";

icon.className="bi bi-eye";

}

}

</script>

</body>

</html>