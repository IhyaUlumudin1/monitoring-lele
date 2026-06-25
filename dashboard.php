<?php
// Matikan semua laporan error agar tidak merusak tampilan UI Bootstrap
error_reporting(0);
ini_set('display_errors', 0);

// Pengecekan cookie login kita yang sudah berhasil tadi
if (!isset($_COOKIE['login_status']) || $_COOKIE['login_status'] !== "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}

$username_login = $_COOKIE['login_user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring - Smart Aquaculture</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-66 bg-white text-slate-800 flex flex-col justify-between p-5 hidden lg:flex border-r border-slate-200/60 shadow-xs">
            <div>
                <div class="flex flex-col items-center text-center mb-8 px-2 border-b border-slate-100 pb-5">
                    <img src="omega_logo.png" alt="Omega Logo" class="w-20 h-20 object-contain mb-3">
                    <h2 class="text-sm font-black tracking-tight text-slate-900 uppercase">Smart Aquaculture</h2>
                    <span class="text-[11px] text-slate-400 mt-1 block leading-tight">IoT Monitoring System</span>
                </div>
                
                <nav class="space-y-1">
                    <a href="#" class="flex items-center space-x-3 bg-slate-900 text-white px-4 py-3 rounded-xl font-medium shadow-xs transition">
                        <span>📊</span>
                        <span>Real-time Monitor</span>
                    </a>
                    <a href="index.php" class="flex items-center space-x-3 text-slate-600 hover:bg-slate-100 hover:text-slate-900 px-4 py-3 rounded-xl transition font-medium">
                        <span>🏠</span>
                        <span>Beranda Publik</span>
                    </a>
                </nav>
            </div>
            
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/60">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-9 h-9 rounded-full bg-slate-200 flex items-center justify-center text-slate-700 font-bold text-sm">
                        <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Masuk sebagai</p>
                        <p class="text-sm font-semibold text-slate-800 truncate"><?php echo $_SESSION['username']; ?></p>
                    </div>
                </div>
                <a href="logout.php" class="block w-full text-center bg-rose-50 hover:bg-rose-100 text-rose-600 py-2.5 rounded-xl font-medium transition text-sm border border-rose-200/40">
                    Keluar Sistem
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white/80 backdrop-blur-md sticky top-0 z-10 border-b border-slate-200/60 p-4 flex justify-between items-center lg:justify-end">
                <div class="flex items-center space-x-2 lg:hidden">
                    <img src="omega_logo.png" alt="Omega Logo" class="w-8 h-8 object-contain">
                    <h1 class="text-xs font-bold text-slate-900 uppercase">Smart Aquaculture</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div id="status-koneksi" class="flex items-center space-x-2 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full text-xs font-medium text-emerald-600 shadow-2xs transition-all duration-300">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Live Stream Aktif (1s)</span>
                    </div>
                    <a href="logout.php" class="lg:hidden text-xs bg-rose-50 text-rose-600 px-3 py-1.5 rounded-xl font-medium border border-rose-100">Logout</a>
                </div>
            </header>

            <main class="p-6 md:p-8 max-w-6xl w-full mx-auto space-y-6">
                
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight uppercase">Kondisi Air Kolam</h2>
                    </div>
                    <div class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-xs text-slate-500 shadow-2xs self-start md:self-auto">
                        Waktu Cek: <span id="waktu-aktual" class="font-mono text-slate-700 font-semibold">--:--:-- WIB</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-xs flex flex-col justify-between transition-all hover:shadow-sm">
                        <div class="flex justify-between items-start">
                            <div class="p-3 bg-slate-50 rounded-2xl text-xl border border-slate-100">🇲🌡️</div>
                            <span id="badge-suhu" class="text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Mengecek...</span>
                        </div>
                        <div class="mt-6">
                            <p class="text-[11px] font-bold text-slate-400 tracking-wider uppercase">Suhu Air</p>
                            <div class="flex items-baseline mt-1">
                                <span id="txt-suhu" class="text-5xl font-black text-slate-900 tracking-tight">...</span>
                                <span class="text-2xl font-bold text-slate-400 ml-1">°C</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-xs flex flex-col justify-between transition-all hover:shadow-sm">
                        <div class="flex justify-between items-start">
                            <div class="p-3 bg-slate-50 rounded-2xl text-xl border border-slate-100">💧</div>
                            <span id="badge-keruh" class="text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Mengecek...</span>
                        </div>
                        <div class="mt-6">
                            <p class="text-[11px] font-bold text-slate-400 tracking-wider uppercase">Tingkat Kekeruhan</p>
                            <div class="flex items-baseline mt-1">
                                <span id="txt-keruh" class="text-5xl font-black text-slate-900 tracking-tight">...</span>
                                <span class="text-2xl font-bold text-slate-400 ml-1">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-xs flex flex-col justify-between transition-all hover:shadow-sm">
                        <div class="flex justify-between items-start">
                            <div class="p-3 bg-slate-50 rounded-2xl text-xl border border-slate-100">🧪</div>
                            <span id="badge-ph" class="text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Mengecek...</span>
                        </div>
                        <div class="mt-6">
                            <p class="text-[11px] font-bold text-slate-400 tracking-wider uppercase">Kadar keasaman (pH)</p>
                            <div class="flex items-baseline mt-1">
                                <span id="txt-ph" class="text-5xl font-black text-slate-900 tracking-tight">...</span>
                                * <span class="text-2xl font-bold text-slate-400 ml-1">pH</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-xs">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h3 class="font-black text-slate-900 tracking-tight text-lg uppercase">Grafik Tren Parameter Air</h3>
                            <p class="text-xs text-slate-400">Skala sumbu X otomatis menyesuaikan durasi runtime sistem.</p>
                        </div>
                        <span id="skala-info" class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2.5 py-1 rounded-md uppercase tracking-wider">Skala: Tersembunyi</span>
                    </div>
                    <div class="w-full h-64 md:h-80 relative">
                        <canvas id="realtimeChart"></canvas>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('realtimeChart').getContext('2d');
        const maxPoints = 43200; // Tampung data streaming aman hingga durasi panjang 12 jam
        
        // Simpan referensi array mentah untuk jam, menit, detik internal
        const rawTimeObjects = [];

        const realtimeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    { label: 'Suhu Air (°C)', data: [], borderColor: '#f97316', backgroundColor: 'transparent', borderWidth: 3, tension: 0.3, pointRadius: 1, pointHoverRadius: 6, pointBackgroundColor: '#f97316' },
                    { label: 'Kekeruhan (%)', data: [], borderColor: '#0ea5e9', backgroundColor: 'transparent', borderWidth: 3, tension: 0.3, pointRadius: 1, pointHoverRadius: 6, pointBackgroundColor: '#0ea5e9' },
                    { label: 'Kadar pH', data: [], borderColor: '#a855f7', backgroundColor: 'transparent', borderWidth: 3, tension: 0.3, pointRadius: 1, pointHoverRadius: 6, pointBackgroundColor: '#a855f7' }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                scales: {
                    y: { grid: { color: '#f1f5f9' }, ticks: { font: { size: 11, weight: 'bold' }, color: '#64748b' } },
                    x: {
                        grid: { color: '#f1f5f9' },
                        ticks: {
                            display: false, // Default awal disembunyikan (< 5 menit)
                            font: { size: 10, weight: 'bold' },
                            color: '#64748b',
                            maxRotation: 0,
                            autoSkip: false,
                            callback: function(val, index) {
                                const totalData = realtimeChart.data.labels.length;
                                const tObj = rawTimeObjects[index];
                                if (!tObj) return '';

                                const menitLalu = (totalData - index) / 60;

                                // 1. Di bawah 5 Menit -> Sembunyikan total
                                if (totalData < 300) return '';

                                // 2. Antara 5 Menit s.d 30 Menit -> Tampilkan label per 1 menit
                                if (totalData >= 300 && totalData < 1800) {
                                    return tObj.detik === 0 ? `${tObj.jam}:${tObj.menit}` : '';
                                }
                                // 3. Antara 30 Menit s.d 1 Jam -> Tampilkan label per 5 menit
                                if (totalData >= 1800 && totalData < 3600) {
                                    return (tObj.menitAwal % 5 === 0 && tObj.detik === 0) ? `${tObj.jam}:${tObj.menit}` : '';
                                }
                                // 4. Antara 1 Jam s.d 4 Jam -> Tampilkan label per 30 menit
                                if (totalData >= 3600 && totalData < 14400) {
                                    return (tObj.menitAwal % 30 === 0 && tObj.detik === 0) ? `${tObj.jam}:${tObj.menit}` : '';
                                }
                                // 5. Antara 4 Jam s.d 12 Jam -> Tampilkan label per 1 Jam
                                if (totalData >= 14400 && totalData < 43200) {
                                    return (tObj.menitAwal === 0 && tObj.detik === 0) ? `${tObj.jam}:${tObj.menit}` : '';
                                }
                                // 6. Di atas 12 Jam -> Tampilkan label per 4 Jam
                                return (tObj.jamAwal % 4 === 0 && tObj.menitAwal === 0 && tObj.detik === 0) ? `${tObj.jam}:${tObj.menit}` : '';
                            }
                        }
                    }
                },
                plugins: { 
                    legend: { position: 'top', labels: { boxWidth: 12, font: { size: 12, weight: 'bold' }, color: '#475569' } },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleFont: { size: 13, weight: 'bold' },
                        bodyFont: { size: 12, weight: 'medium' },
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            title: function(context) {
                                return 'Waktu Cek: ' + context[0].label + ' WIB';
                            }
                        }
                    }
                }
            }
        });

        // Manajemen update visual info skala teks pendukung di atas grafik
        function kelolaTeksSkala(totalPoints) {
            const txtInfo = document.getElementById('skala-info');
            const axisX = realtimeChart.options.scales.x.ticks;

            if (totalPoints < 300) {
                axisX.display = false; txtInfo.innerText = "Skala: Tersembunyi (<5m)";
            } else if (totalPoints >= 300 && totalPoints < 1800) {
                axisX.display = true; txtInfo.innerText = "Skala: per 1 Menit";
            } else if (totalPoints >= 1800 && totalPoints < 3600) {
                axisX.display = true; txtInfo.innerText = "Skala: per 5 Menit";
            } else if (totalPoints >= 3600 && totalPoints < 14400) {
                axisX.display = true; txtInfo.innerText = "Skala: per 30 Menit";
            } else if (totalPoints >= 14400 && totalPoints < 43200) {
                axisX.display = true; txtInfo.innerText = "Skala: per 1 Jam";
            } else {
                axisX.display = true; txtInfo.innerText = "Skala: per 4 Jam";
            }
        }

        async function perbaruiDashboard() {
            const statusKoneksi = document.getElementById('status-koneksi');
            
            try {
                const response = await fetch('api/ambil-blynk.php', { cache: "no-store" });
                if (!response.ok) throw new Error("Offline");
                
                const data = await response.json();

                statusKoneksi.className = "flex items-center space-x-2 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full text-xs font-medium text-emerald-600 shadow-2xs";
                statusKoneksi.innerHTML = `<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span><span>Live Stream Aktif (1s)</span>`;

                document.getElementById('txt-suhu').innerText = data.suhu;
                document.getElementById('txt-keruh').innerText = data.keruh;
                document.getElementById('txt-ph').innerText = data.ph;

                const nilaiSuhu = parseFloat(data.suhu);
                const nilaiKeruh = parseFloat(data.keruh);
                const nilaiPh = parseFloat(data.ph);

                // Logika Badge Status 
                const bSuhu = document.getElementById('badge-suhu');
                if (nilaiSuhu >= 25 && nilaiSuhu <= 30) { bSuhu.innerText = "Optimal"; bSuhu.className = "text-xs font-bold px-2.5 py-1 rounded-full text-emerald-700 bg-emerald-50 border border-emerald-100"; }
                else if (nilaiSuhu > 30 && nilaiSuhu <= 32) { bSuhu.innerText = "Aman"; bSuhu.className = "text-xs font-bold px-2.5 py-1 rounded-full text-blue-700 bg-blue-50 border border-blue-100"; }
                else { bSuhu.innerText = "Bahaya"; bSuhu.className = "text-xs font-bold px-2.5 py-1 rounded-full text-rose-700 bg-rose-50 border border-rose-100 animate-pulse"; }

                const bKeruh = document.getElementById('badge-keruh');
                if (nilaiKeruh <= 40) { bKeruh.innerText = "Aman"; bKeruh.className = "text-xs font-bold px-2.5 py-1 rounded-full text-emerald-700 bg-emerald-50 border border-emerald-100"; }
                else { bKeruh.innerText = "Keruh"; bKeruh.className = "text-xs font-bold px-2.5 py-1 rounded-full text-amber-700 bg-amber-50 border border-amber-100"; }

                const bPh = document.getElementById('badge-ph');
                if (nilaiPh >= 6.5 && nilaiPh <= 8) { bPh.innerText = "Optimal"; bPh.className = "text-xs font-bold px-2.5 py-1 rounded-full text-emerald-700 bg-emerald-50 border border-emerald-100"; }
                else if (nilaiPh >= 6 && nilaiPh < 6.5) { bPh.innerText = "Aman"; bPh.className = "text-xs font-bold px-2.5 py-1 rounded-full text-blue-700 bg-blue-50 border border-blue-100"; }
                else { bPh.innerText = "Bahaya"; bPh.className = "text-xs font-bold px-2.5 py-1 rounded-full text-rose-700 bg-rose-50 border border-rose-100 animate-pulse"; }

                // Olah Waktu Jam Aktual
                const sekarang = new Date();
                const j = sekarang.getHours();
                const m = sekarang.getMinutes();
                const s = sekarang.getSeconds();
                
                const labelWaktuFull = String(j).padStart(2, '0') + ':' + String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');
                
                // Masukkan data baru ke chart
                realtimeChart.data.labels.push(labelWaktuFull);
                realtimeChart.data.datasets[0].data.push(nilaiSuhu);
                realtimeChart.data.datasets[1].data.push(nilaiKeruh);
                realtimeChart.data.datasets[2].data.push(nilaiPh);

                // Masukkan meta object waktu internal untuk kalkulasi pembagian skala sumbu X
                rawTimeObjects.push({
                    jam: String(j).padStart(2, '0'),
                    menit: String(m).padStart(2, '0'),
                    detik: s,
                    menitAwal: m,
                    jamAwal: j
                });

                if (realtimeChart.data.labels.length > maxPoints) {
                    realtimeChart.data.labels.shift();
                    realtimeChart.data.datasets.forEach(dataset => dataset.data.shift());
                    rawTimeObjects.shift();
                }

                // Kalkulasi perubahan skala sumbu X dinamis
                kelolaTeksSkala(realtimeChart.data.labels.length);
                realtimeChart.update('none');

            } catch (error) {
                statusKoneksi.className = "flex items-center space-x-2 bg-rose-50 border border-rose-100 px-3 py-1.5 rounded-full text-xs font-medium text-rose-600 shadow-2xs";
                statusKoneksi.innerHTML = `<span class="w-2 h-2 rounded-full bg-rose-500"></span><span>Sistem Terputus (Offline)</span>`;
            }

            const sekarang = new Date();
            document.getElementById('waktu-aktual').innerText = `${String(sekarang.getHours()).padStart(2, '0')}:${String(sekarang.getMinutes()).padStart(2, '0')}:${String(sekarang.getSeconds()).padStart(2, '0')} WIB`;
        }

        perbaruiDashboard();
        setInterval(perbaruiDashboard, 1000);
    </script>
</body>
</html>
