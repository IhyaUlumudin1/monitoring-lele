<?php
include 'koneksi.php';

$username = pg_escape_string($koneksi, $_POST['username']);
$password = pg_escape_string($koneksi, $_POST['password']);

// Cari username dan password yang cocok
$query  = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = pg_query($koneksi, $query);

if (pg_num_rows($result) === 1) {
    // === PERBAIKAN: Gunakan Cookie sebagai ganti Session ===
    // Cookie ini berlaku selama 1 jam (3600 detik)
    setcookie('login_status', 'login', time() + 3600, '/');
    setcookie('login_user', $username, time() + 3600, '/');
    
    header("location:dashboard.php"); 
    exit;
} else {
    header("location:login.php?pesan=gagal");
    exit;
}
?>
