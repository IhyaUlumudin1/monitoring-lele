<?php
// 1. --- HUBUNGKAN KE DATABASE SUPABASE ---
include 'koneksi.php';

// Pengaturan Token Blynk kamu
$blynk_token = "52dgBQ4MFtrIeKlfe9NRYauYnTXfFA2T"; 

function ambil_pin($token, $pin) {
    $url = "https://blynk.cloud/external/api/get?token=" . $token . "&" . $pin;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 2); 
    $respons = curl_exec($ch);
    curl_close($ch);
    
    return ($respons === false || trim($respons) == "") ? "0" : trim($respons);
}

// Ambil data ketiga pin secara real-time
$suhu  = ambil_pin($blynk_token, "v0");
$keruh = ambil_pin($blynk_token, "v1");
$ph    = ambil_pin($blynk_token, "v2");

$float_suhu  = floatval($suhu);
$float_keruh = floatval($keruh);
$float_ph    = floatval($ph);

// 2. --- SIMPAN DATA KE DATABASE SUPABASE (POSTGRESQL) ---
// Hanya menyimpan jika data sensor valid (tidak nol semua)
if ($float_suhu != 0 || $float_keruh != 0 || $float_ph != 0) {
    $query_simpan = "INSERT INTO riwayat_sensor (suhu, keruh, ph) VALUES ($float_suhu, $float_keruh, $float_ph)";
    // Menggunakan pg_query khusus untuk database Supabase
    @pg_query($koneksi, $query_simpan);
}

// 3. --- KEMBALIKAN HASIL DALAM FORMAT JSON ---
header('Content-Type: application/json');
echo json_encode([
    'suhu'  => $float_suhu,
    'keruh' => $float_keruh,
    'ph'    => $float_ph
]);
?>