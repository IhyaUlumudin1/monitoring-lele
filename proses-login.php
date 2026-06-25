<?php
session_start();
include 'koneksi.php';

$username = pg_escape_string($koneksi, $_POST['username']);
$password = pg_escape_string($koneksi, $_POST['password']);

// === PERBAIKAN: Enkripsi MD5 Dihapus ===
// Kita langsung gunakan variabel $password teks biasa untuk dicocokkan ke database
$query  = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = pg_query($koneksi, $query);

if (pg_num_rows($result) === 1) {
    $_SESSION['status']   = "login";
    $_SESSION['username'] = $username;
    
    // Diarahkan ke dashboard.php sesuai struktur vercel.json aslimu
    header("location:dashboard.php"); 
    exit;
} else {
    // Diarahkan kembali ke login.php jika gagal
    header("location:login.php?pesan=gagal");
    exit;
}
?>
