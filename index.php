<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Aquaculture - OMEGA</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#f1f5f9] text-slate-800 font-sans flex flex-col min-h-screen antialiased">

    <!-- HEADER NAVIGATION (Ramping & Mengunci h-16) -->
    <header class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 px-6 py-2 md:px-12 flex justify-between items-center shadow-xs h-20">
        <!-- Logo Omega -->
        <a href="index.php" class="flex items-center relative z-10">
            <img src="Omega_logo_png.png" alt="Omega Logo" class="h-24 md:h-28 w-auto object-contain transition transform hover:scale-102 origin-left -my-4">
        </a>

        <!-- Menu Navigasi Kanan -->
        <nav class="flex items-center space-x-8 text-xs font-bold tracking-wide uppercase text-slate-600">
            <a href="about.php" class="hover:text-blue-600 transition">About Us</a>
            <!-- Tombol Login -->
            <a href="login.php" class="flex items-center space-x-2 bg-slate-900 hover:bg-slate-800 text-white px-5 py-2 rounded-full transition shadow-xs">
                <span>Login</span>
            </a>
        </nav>
    </header>

    <!-- SECTION 1: HERO SHOWCASE (Gradasi Di-tweak Mengandung Unsur Abu-abu Slate) -->
    <section class="h-[calc(100vh-4rem)] w-full grid grid-cols-1 lg:grid-cols-12 items-center px-6 md:px-20 relative bg-cover bg-center bg-no-repeat"
             style="background-image: linear-gradient(to right, rgba(241, 245, 249, 0.96) 40%, rgba(241, 245, 249, 0.6) 70%, rgba(241, 245, 249, 0.15) 100%), url('bg_alat.jpg');">
        
        <!-- Konten Teks di Sisi Kiri -->
        <div class="lg:col-span-7 space-y-6 text-left max-w-2xl relative z-10 animate-fade-in">
            <span class="text-xs font-bold tracking-widest text-slate-600 bg-slate-200/80 border border-slate-300 px-3 py-1.5 rounded-full uppercase">
                Smart Aquaculture IoT Platform
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight leading-tight uppercase">
                OMEGA <br><span class="text-blue-600">Smart Monitoring</span>
            </h1>
            <p class="text-slate-600 text-base md:text-lg leading-relaxed text-justify">
                Solusi monitoring kualitas air berbasis Internet of Things untuk budidaya ikan yang lebih efisien, presisi, dan berkelanjutan melalui pemantauan real-time suhu, pH, dan kekeruhan air.
            </p>
            <div class="pt-4 flex flex-wrap gap-4">
                <a href="#features" class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-6 py-3 rounded-xl shadow-md transition">
                    Explore Features
                </a>
                <a href="login.php" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3 rounded-xl shadow-md transition">
                    Open Dashboard
                </a>
            </div>
        </div>

        <!-- Indikator Panah Scroll ke Bawah -->
        <a href="#features" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-slate-400 hover:text-slate-800 transition flex flex-col items-center space-y-1 animate-bounce z-20">
            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Scroll Down</span>
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
            </svg>
        </a>
    </section>

    <!-- SECTION 2: SMART MONITORING FEATURES (Background Abu-abu Slate Muda) -->
    <section id="features" class="py-24 px-6 md:px-12 bg-[#e2e8f0] border-t border-slate-300/50 text-center">
        <div class="max-w-6xl mx-auto space-y-16">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight uppercase">Smart Monitoring Features</h2>
                <p class="text-slate-600 mt-3 text-sm md:text-base font-medium">Teknologi yang dirancang untuk menjaga kualitas air kolam secara optimal.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto text-left">
                <!-- 1. Temperature -->
                <div class="bg-white p-6 rounded-2xl border border-slate-300/70 shadow-xs transition hover:border-slate-400">
                    <div class="text-3xl mb-4">🌡️</div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Temperature Monitoring</h3>
                    <p class="text-xs md:text-sm text-slate-500 leading-relaxed text-justify">Pemantauan suhu air secara real-time.</p>
                </div>
                <!-- 2. pH -->
                <div class="bg-white p-6 rounded-2xl border border-slate-300/70 shadow-xs transition hover:border-slate-400">
                    <div class="text-3xl mb-4">🧪</div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">pH Monitoring</h3>
                    <p class="text-xs md:text-sm text-slate-500 leading-relaxed text-justify">Monitoring tingkat keasaman air.</p>
                </div>
                <!-- 3. Turbidity -->
                <div class="bg-white p-6 rounded-2xl border border-slate-300/70 shadow-xs transition hover:border-slate-400">
                    <div class="text-3xl mb-4">💧</div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Turbidity Monitoring</h3>
                    <p class="text-xs md:text-sm text-slate-500 leading-relaxed text-justify">Monitoring tingkat kekeruhan air.</p>
                </div>
                <!-- 4. Mobile Access -->
                <div class="bg-white p-6 rounded-2xl border border-slate-300/70 shadow-xs transition hover:border-slate-400">
                    <div class="text-3xl mb-4">📱</div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Mobile Access</h3>
                    <p class="text-xs md:text-sm text-slate-500 leading-relaxed text-justify">Pantau kondisi kolam dari mana saja.</p>
                </div>
                <!-- 5. Cloud Database -->
                <div class="bg-white p-6 rounded-2xl border border-slate-300/70 shadow-xs transition hover:border-slate-400">
                    <div class="text-3xl mb-4">📊</div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Google Sheets Integration</h3>
                    <p class="text-xs md:text-sm text-slate-500 leading-relaxed text-justify">Google Sheets untuk perekaman log data.</p>
                </div>
                <!-- 6. Smart Alert -->
                <div class="bg-white p-6 rounded-2xl border border-slate-300/70 shadow-xs transition hover:border-slate-400">
                    <div class="text-3xl mb-4">🔔</div>
                    <h3 class="font-bold text-slate-900 text-base mb-2">Smart Alert</h3>
                    <p class="text-xs md:text-sm text-slate-500 leading-relaxed text-justify">Notifikasi otomatis saat terjadi anomali.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: WORKFLOW SYSTEM -->
    <section class="py-24 px-6 bg-white text-center border-t border-slate-200">
        <div class="max-w-5xl mx-auto space-y-16">
            <div>
                <span class="text-xs font-bold tracking-widest text-slate-600 bg-slate-100 border border-slate-200 px-3 py-1.5 rounded-full uppercase">System Workflow</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight uppercase mt-4">How It Works</h2>
                <p class="text-slate-500 mt-2 text-sm md:text-base font-medium">Siklus pengiriman data dari perangkat keras hingga ke tangan pengguna.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pt-4">
                <div class="flex flex-col items-center space-y-3">
                    <div class="text-4xl filter drop-shadow-xs">📡</div>
                    <h4 class="font-bold text-slate-900 text-sm md:text-base">Sensor Node</h4>
                    <p class="text-xs md:text-sm text-slate-500">Sensor membaca kondisi air kolam.</p>
                </div>
                <div class="flex flex-col items-center space-y-3">
                    <div class="text-4xl filter drop-shadow-xs">⚪</div>
                    <h4 class="font-bold text-slate-900 text-sm md:text-base">Google Sheets Cloud</h4>
                    <p class="text-xs md:text-sm text-slate-500">Data dikirim dan disimpan berkala tiap 5 menit.</p>
                </div>
                <div class="flex flex-col items-center space-y-3">
                    <div class="text-4xl filter drop-shadow-xs">📊</div>
                    <h4 class="font-bold text-slate-900 text-sm md:text-base">Dashboard Monitoring</h4>
                    <p class="text-xs md:text-sm text-slate-500">User memantau visual data secara real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: CTA MONITORING BANNER -->
    <section class="bg-[#0b1329] text-white text-center py-20 px-6 border-t border-slate-900">
        <div class="max-w-3xl mx-auto space-y-6">
            <h2 class="text-2xl md:text-4xl font-black tracking-tight">Ready to Monitor Your Aquaculture System?</h2>
            <p class="text-slate-400 text-xs md:text-sm">Access your dashboard and start monitoring now.</p>
            <div class="pt-4">
                <a href="login.php" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-blue-600/25 transition transform hover:-translate-y-0.5 inline-block">
                    Go To Dashboard
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER MINIMALIS -->
    <footer class="bg-[#070c1b] border-t border-slate-900/60 py-5 px-6 text-center text-xs font-medium text-slate-500">
        <p>Copyright &copy; <?php echo date('Y'); ?> <span class="font-bold text-slate-400">OMEGA Technology Co., Ltd.</span> All Rights Reserved.</p>
    </footer>

</body>
</html>