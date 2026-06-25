<?php
$host     = "aws-1-ap-northeast-2.pooler.supabase.com"; // Disesuaikan dengan foto terbaru kamu
$port     = "6543"; // Sesuai petunjuk port di foto
$user     = "postgres.gxntzirycnuhykulhdpb"; // Sesuai petunjuk user di foto
$password = "Monitoring_lele123"; // Gunakan password baru yang tadi kamu reset/buat
$database = "postgres";

$koneksi = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if (!$koneksi) {
    die(json_encode(["error" => "Koneksi ke Database Cloud Supabase Gagal."]));
}
?>
