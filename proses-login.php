<?php
session_start();
include 'koneksi.php';

$username = pg_escape_string($koneksi, $_POST['username']);
$password = pg_escape_string($koneksi, $_POST['password']);

// Kita enkripsi password inputan user dengan MD5
$password_md5 = md5($password);

// Kita cari yang username DAN password-nya cocok di database
$query  = "SELECT * FROM users WHERE username='$username' AND password='$password_md5'";
$result = pg_query($koneksi, $query);

if (pg_num_rows($result) === 1) {
    $_SESSION['status']   = "login";
    $_SESSION['username'] = $username;
    
    header("location:dashboard.php");
    exit;
} else {
    header("location:login.php?pesan=gagal");
    exit;
}
?>
