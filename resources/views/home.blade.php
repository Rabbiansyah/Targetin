<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Targetin - Wujudkan Impian Anda</title>
    <meta name="description"
        content="Platform terbaik untuk mengatur, melacak, dan mencapai semua tujuan hidup Anda. Mulai perjalanan menuju kesuksesan hari ini." />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="bg-gray-50 overflow-x-hidden">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold gradient-text">Targetin</h1>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features"
                        class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">Fitur</a>
                    <a href="#how-it-works"
                        class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">Cara
                        Kerja</a>
                    <a href="{{ route('login') }}"
                        class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium transition-colors">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Daftar
                        Gratis</a>
                </div>

                <!-- Mobile Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-white shadow-md rounded-b-lg">
            <a href="#features" class="block text-gray-700 font-medium hover:text-blue-600">Fitur</a>
            <a href="#how-it-works" class="block text-gray-700 font-medium hover:text-blue-600">Cara Kerja</a>
            <a href="{{ route('login') }}" class="block text-gray-700 font-medium hover:text-blue-600">Masuk</a>
            <a href="{{ route('register') }}"
                class="block bg-blue-600 text-white px-4 py-2 rounded-md text-center hover:bg-blue-700">Daftar
                Gratis</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-50 to-indigo-100 pt-24 pb-16 sm:pt-28 sm:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Wujudkan Impian Anda<br />
                    <span class="text-blue-600">Satu Goal</span> dalam Satu Waktu
                </h1>
                <p class="text-base sm:text-xl md:text-2xl text-gray-700 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Platform terbaik untuk mengatur, melacak, dan mencapai semua tujuan hidup Anda. Dari karir hingga
                    kesehatan,
                    dari keuangan hingga hobi.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl text-base sm:text-lg font-semibold transition-all transform hover:scale-105 shadow-lg">
                        🚀 Mulai Gratis Sekarang
                    </a>
                    <a href="#features"
                        class="bg-white hover:bg-gray-50 text-blue-600 px-6 sm:px-8 py-3 sm:py-4 rounded-xl text-base sm:text-lg font-semibold transition-all border border-blue-200">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Fitur Lengkap untuk <span class="gradient-text">Kesuksesan Anda</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Semua yang Anda butuhkan untuk mengatur dan mencapai tujuan hidup dalam satu platform
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 gap-y-12">
                <!-- Feature Items (same as before) -->
                <!-- ... (keep your original feature cards unchanged here) -->
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Cara Kerja <span class="gradient-text">Targetin</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Tiga langkah sederhana untuk memulai perjalanan menuju kesuksesan Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Steps 1-3 (keep original content) -->
                <!-- ... -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold gradient-text mb-4">Targetin</h3>
                    <p class="text-gray-400 mb-4">
                        Platform terbaik untuk mengatur, melacak, dan mencapai semua tujuan hidup Anda.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Produk</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#features" class="hover:text-white transition-colors">Fitur</a></li>
                        <li><a href="#how-it-works" class="hover:text-white transition-colors">Cara Kerja</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Daftar</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Masuk</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Dukungan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="/kontak" class="hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Targetin. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Toggle mobile menu
        const menuBtn = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    </script>
</body>

</html>
