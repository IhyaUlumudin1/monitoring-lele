<?php
session_start();
// Menghancurkan semua session login
session_destroy();
// Lempar balik ke halaman depan
header("location:index.php");
exit;
?>