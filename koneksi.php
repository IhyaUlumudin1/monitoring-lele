<?php
$host     = "aws-1-ap-southeast-1.pooler.supabase.com"; 
$port     = "6543"; // Gunakan port default pooler Supabase
$user     = "postgres"; // Cukup tulis postgres saja, hapus teks titik dan ID project-nya
$password = "Monitoring_lele123"; // Pastikan password baru yang sudah kamu ganti tadi
$database = "postgres";

$koneksi = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if (!$koneksi) {
    die(json_encode(["error" => "Koneksi ke Database Cloud Supabase Gagal."]));
}
?>
