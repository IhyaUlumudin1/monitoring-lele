<?php
$host     = "aws-1-ap-southeast-1.pooler.supabase.com"; 
$port     = "6543"; // PENTING: Gunakan port 6543 untuk mode pooling
$user     = "postgres.gxntzirycnuhykulhdpb"; // Gunakan user lengkap ini
$password = "Monitoring_lele123"; // Ganti dengan password database kamu
$database = "postgres";

$koneksi = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if (!$koneksi) {
    die(json_encode(["error" => "Koneksi ke Database Cloud Supabase Gagal."]));
}
?>
