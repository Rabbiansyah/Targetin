
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    @vite('resources/css/app.css') {{-- Jika pakai Vite --}}
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-blue-600">404</h1>
        <p class="text-2xl mt-4 text-gray-700">Halaman Tidak Ditemukan</p>
        <p class="text-gray-500 mt-2">Maaf, halaman yang kamu cari tidak tersedia atau sudah dipindahkan.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
