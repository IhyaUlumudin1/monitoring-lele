<?php
include 'koneksi.php';

// Menarik 30 data riwayat sensor terbaru dari database Supabase
$query = "SELECT TO_CHAR(waktu, 'HH24:MI:SS') as jam, suhu, keruh, ph 
          FROM riwayat_sensor 
          ORDER BY waktu DESC 
          LIMIT 30";

$result = pg_query($koneksi, $query);

$data = [];

if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        // array_unshift digunakan supaya data yang paling lama muncul di kiri grafik
        array_unshift($data, [
            "waktu" => $row['jam'],
            "suhu"  => floatval($row['suhu']),
            "keruh" => floatval($row['keruh']),
            "ph"    => floatval($row['ph'])
        ]);
    }
}

// Set response berupa JSON agar bisa dibaca oleh JavaScript di dashboard.php
header('Content-Type: application/json');
echo json_encode($data);
?>