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

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login SIMPEG</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

:root{

--dark:#443025;
--brown:#7F5836;
--milk:#AA7F66;
--pink:#EC9C9D;
--rose:#F2CFD2;

}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:linear-gradient(135deg,#443025,#7F5836);

font-family:'Segoe UI',sans-serif;

}

.login-card{

width:420px;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0 15px 40px rgba(0,0,0,.25);

}

.header{

background:#443025;

padding:35px;

text-align:center;

color:white;

}

.header i{

font-size:55px;

color:#EC9C9D;

}

.header h3{

margin-top:15px;

}

.body-login{

padding:30px;

}

.form-control{

border-radius:10px;

padding:12px;

}

.form-control:focus{

border-color:#EC9C9D;

box-shadow:0 0 8px rgba(236,156,157,.4);

}

.btn-login{

background:#EC9C9D;

color:white;

width:100%;

padding:12px;

border:none;

border-radius:10px;

font-weight:bold;

transition:.3s;

}

.btn-login:hover{

background:#d97d80;

}

.footer{

text-align:center;

padding:15px;

background:#fafafa;

font-size:14px;

}

.footer a{

color:#7F5836;

text-decoration:none;

font-weight:bold;

}

.btn-outline-secondary{
    border:2px solid #AA7F66;
    color:#AA7F66;
    border-radius:10px;
    font-weight:600;
}

.btn-outline-secondary:hover{
    background:#AA7F66;
    color:white;
    border-color:#AA7F66;
}
</style>

</head>

<body>

<div class="login-card">

<div class="header">

<i class="bi bi-buildings-fill"></i>

<h3>SIMPEG</h3>

<p>Sistem Informasi Data Pegawai</p>

</div>

<div class="body-login">

<form action="../../controller/AuthController.php" method="POST">

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-4">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
type="submit"
name="login"
class="btn-login">

<i class="bi bi-box-arrow-in-right"></i>

Login

</button>
<div class="text-center mt-3">
    Belum punya akun?

    <a href="register.php" class="text-decoration-none fw-bold" style="color:#AA7F66;">
        Register
    </a>
</div>
</form>

</div>

<div class="footer">

© <?= date('Y') ?> SIMPEG

</div>

</div>

</body>

</html>