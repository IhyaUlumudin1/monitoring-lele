<?php
$host     = "db.gxntzirycnuhykulhdpb.supabase.co"; // Sesuaikan dengan isi kotak Direct Connection String
$port     = "5432";
$user     = "postgres";
$password = "Monitoring_lele123"; // Ganti dengan password yang kamu buat saat bikin database
$database = "postgres";

$koneksi = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if (!$koneksi) {
    die(json_encode(["error" => "Koneksi ke Database Cloud Supabase Gagal."]));
}
?>