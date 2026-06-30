<?php

session_start();

require_once "../model/User.php";

$user = new User();

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $data = $user->login($username);

    if ($data && password_verify($password, $data['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['id']    = $data['id'];
        $_SESSION['nama']  = $data['nama'];

        header("Location: ../dashboard.php");
        exit;
    }

    header("Location: ../view/auth/login.php?error=1");
    exit;
}


if (isset($_POST['register'])) {

    $nama     = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($user->register($nama, $username, $password)) {

        header("Location: ../view/auth/login.php?register=success");
        exit;

    } else {

        header("Location: ../view/auth/register.php?error=username");
        exit;

    }
}
    $_SESSION['success']="Login berhasil";