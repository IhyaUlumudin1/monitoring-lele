<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SmartLele</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-900 mb-2">Selamat Datang</h2>
        <p class="text-gray-500 text-sm text-center mb-6">Silakan login untuk mengakses dashboard monitoring air</p>

        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm text-center">
                Username atau Password salah!
            </div>
        <?php endif; ?>

        <form action="proses-login.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Masuk
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="index.php" class="text-sm text-blue-600 hover:underline">← Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>