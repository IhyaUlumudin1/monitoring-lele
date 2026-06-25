<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - OMEGA Technology</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#f1f5f9] text-slate-800 font-sans flex flex-col min-h-screen antialiased">

    <!-- HEADER NAVIGATION (Ramping & Mengunci h-16) -->
    <header class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 px-6 py-2 md:px-12 flex justify-between items-center shadow-xs h-20">
        <a href="index.php" class="flex items-center relative z-10">
            <img src="Omega_logo_png.png" alt="Omega Logo" class="h-24 md:h-28 w-auto object-contain transition transform hover:scale-102 origin-left -my-4">
        </a>
        <nav class="flex items-center space-x-8 text-xs font-bold tracking-wide uppercase text-slate-600">
            <a href="index.php" class="hover:text-blue-600 transition">Home</a>
            <a href="login.php" class="flex items-center space-x-2 bg-slate-900 hover:bg-slate-800 text-white px-5 py-2 rounded-full transition shadow-xs">
                <span>Login</span>
            </a>
        </nav>
    </header>

    <!-- SECTION 1: HERO ABOUT US (Mengadopsi Campuran Gradasi Abu-abu) -->
    <section class="h-[50vh] w-full grid grid-cols-1 lg:grid-cols-12 items-center px-6 md:px-20 relative bg-cover bg-center bg-no-repeat"
             style="background-image: linear-gradient(to right, rgba(241, 245, 249, 0.96) 50%, rgba(241, 245, 249, 0.6) 70%, rgba(241, 245, 249, 0.2) 100%), url('bg_alat.jpg');">
        
        <div class="lg:col-span-8 space-y-4 text-left max-w-2xl relative z-10">
            <span class="text-xs font-bold tracking-widest text-slate-600 bg-slate-200 border border-slate-300 px-3 py-1.5 rounded-full uppercase">
                Project Profile
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight uppercase">
                Tentang <span class="text-blue-600">Proyek Kami</span>
            </h1>
            <p class="text-slate-500 text-xs md:text-sm font-bold uppercase tracking-wide">
                Inovasi Teknologi IoT untuk Keberlanjutan Sektor Aquaculture
            </p>
        </div>
    </section>

    <!-- SECTION 2: LATAR BELAKANG (Grid Bernuansa Abu-Abu Lembut) -->
    <main class="flex-1 w-full mx-auto space-y-24 py-20 bg-[#e2e8f0] border-t border-slate-300/50">
        
        <section class="max-w-5xl mx-auto px-6">
            <div class="bg-white border border-slate-300 rounded-3xl p-8 md:p-12 shadow-xs grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                <div class="md:col-span-4">
                    <span class="text-xs font-bold tracking-widest text-slate-400 uppercase block mb-2">Background</span>
                    <h2 class="text-xl md:text-2xl font-black text-slate-900 uppercase tracking-tight">Latar Belakang</h2>
                </div>
                <div class="md:col-span-8 text-slate-600 space-y-4 text-sm md:text-base leading-relaxed text-justify">
                    <p>
                        Budidaya perikanan modern atau <span class="text-slate-900 font-bold">Aquaculture</span> seringkali menghadapi kendala besar berupa tingginya angka mortalitas biota air akibat fluktuasi kualitas air kolam yang tidak terpantau secara berkala. Faktor tidak kasat mata seperti perubahan suhu ekstrem, lonjakan keasaman (pH), dan kepekatan zat padat terlarut yang memicu kekeruhan sering terlambat ditangani oleh para pembudidaya.
                    </p>
                    <p>
                        Berangkat dari permasalahan tersebut, proyek ini diinisiasi untuk membangun jembatan solusi berbasis otomatisasi hardware dan software. Dengan menerapkan ekosistem <span class="text-slate-900 font-bold">Internet of Things (IoT)</span>, parameter vital air kolam dapat diubah menjadi data digital berkecepatan tinggi yang diperbarui secara langsung. Keberadaan platform ini diharapkan mampu meningkatkan efisiensi operasional dan memastikan kestabilan ekosistem budidaya secara cerdas.
                    </p>
                </div>
            </div>
        </section>

        <!-- SECTION 3: PENGENALAN ANGGOTA TIM -->
        <section class="max-w-5xl mx-auto px-6 text-center space-y-12">
            <div>
                <span class="text-xs font-bold tracking-widest text-slate-600 bg-slate-100 border border-slate-200 px-3 py-1.5 rounded-full uppercase">Our Team</span>
                <h2 class="text-2xl md:text-4xl font-black text-slate-900 mt-4 uppercase tracking-tight">Anggota Tim Kami</h2>
                <p class="text-slate-600 mt-2 text-sm font-medium">Talenta di balik pengembangan sistem monitoring cerdas OMEGA.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                
                <!-- ANGGOTA 1: IHYA ULUMUDIN -->
                <div class="bg-white border border-slate-300 rounded-3xl p-8 flex flex-col items-center transition hover:border-slate-400 shadow-xs">
                    <!-- Bingkai Foto Minimalis Bernuansa Abu-abu -->
                    <div class="w-32 h-32 rounded-full bg-slate-100 border border-slate-300 overflow-hidden mb-6 flex items-center justify-center text-slate-400 relative">
                        <span class="text-[10px] font-bold tracking-widest uppercase text-slate-400">FOTO 132x132</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 tracking-wide uppercase">IHYA ULUMUDIN</h3>
                </div>

                <!-- ANGGOTA 2: ABIANSHAH ABDULLAH -->
                <div class="bg-white border border-slate-300 rounded-3xl p-8 flex flex-col items-center transition hover:border-slate-400 shadow-xs">
                    <!-- Bingkai Foto Minimalis Bernuansa Abu-abu -->
                    <div class="w-32 h-32 rounded-full bg-slate-100 border border-slate-300 overflow-hidden mb-6 flex items-center justify-center text-slate-400 relative">
                        <span class="text-[10px] font-bold tracking-widest uppercase text-slate-400">FOTO 132x132</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 tracking-wide uppercase">ABIANSHAH ABDULLAH</h3>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#070c1b] border-t border-slate-900/60 py-5 px-6 text-center text-xs font-medium text-slate-500">
        <p>Copyright &copy; <?php echo date('Y'); ?> <span class="font-bold text-slate-400">OMEGA Technology Co., Ltd.</span> All Rights Reserved.</p>
    </footer>

</body>
</html>