<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontak</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <section class="pt-24 pb-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Mari <span class="text-gray-700">Terhubung</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Punya pertanyaan, ide project menarik, atau ingin sekadar ngobrol tentang teknologi?
                Jangan ragu untuk menghubungi saya!
            </p>
        </div>
    </section>

    <!-- Contact Cards -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Main Contact Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-8">
                <div class="text-center mb-8">
                    <div
                        class="w-20 h-20 mx-auto mb-4 rounded-xl bg-gradient-to-r from-gray-700 to-gray-800 p-1 flex items-center justify-center">
                        <div class="w-full h-full rounded-lg bg-white flex items-center justify-center">
                            <img class="w-16 h-16 rounded-lg object-cover" src="{{ asset('alek.jpg') }}"
                                alt="Default avatar">
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Faiz</h2>
                    <p class="text-gray-600">Full-Stack Web Developer</p>
                </div>

                <!-- Contact Methods -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Email -->
                    <div class="group">
                        <a href="mailto:faizasfar711@gmail.com"
                            class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-red-600 transition-colors">Email
                                </h3>
                                <p class="text-gray-600">faizasfar711@gmail.com</p>
                            </div>
                        </a>
                    </div>

                    <!-- LinkedIn -->
                    <div class="group">
                        <a href="https://www.linkedin.com/in/faiz-asfar-triansyah-959067356/" target="_blank"
                            class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                                    LinkedIn</h3>
                                <p class="text-gray-600">Faiz Asfar Triansyah</p>
                            </div>
                        </a>
                    </div>

                    <!-- GitHub -->
                    <div class="group">
                        <a href="https://github.com/Rabbiansyah" target="_blank"
                            class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <div class="w-12 h-12 bg-gray-900 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 10.95-.111-.937-.199-2.403.04-3.44.219-.937 1.406-5.957 1.406-5.957s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.332 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.001z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-gray-700 transition-colors">
                                    GitHub</h3>
                                <p class="text-gray-600">Rabbiansyah</p>
                            </div>
                        </a>
                    </div>

                    <!-- WhatsApp -->
                    <div class="group">
                        <a href="https://wa.me/628811165548" target="_blank"
                            class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-green-600 transition-colors">
                                    WhatsApp</h3>
                                <p class="text-gray-600">+62 881-1165-548</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Social Media Cards -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <!-- Twitter -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-400 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Twitter</h3>
                            <p class="text-gray-600">@Rabbsv</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Follow untuk update terbaru seputar web development dan tech
                        insights</p>
                    <a href="https://x.com/Rabbsv" target="_blank"
                        class="inline-flex items-center text-blue-400 hover:text-blue-500 font-medium text-sm">
                        Follow di Twitter
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>

                <!-- Instagram -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C8.396 0 7.989.013 7.041.072 6.094.131 5.447.226 4.86.432a6.924 6.924 0 00-2.5 1.628A6.924 6.924 0 00.832 4.86C.626 5.447.53 6.094.472 7.041.413 7.989.4 8.396.4 12.017c0 3.622.013 4.029.072 4.976.059.947.154 1.594.36 2.181a6.925 6.925 0 001.628 2.5 6.925 6.925 0 002.5 1.628c.587.206 1.234.301 2.181.36.947.059 1.354.072 4.976.072 3.622 0 4.029-.013 4.976-.072.947-.059 1.594-.154 2.181-.36a6.925 6.925 0 002.5-1.628 6.925 6.925 0 001.628-2.5c.206-.587.301-1.234.36-2.181.059-.947.072-1.354.072-4.976 0-3.622-.013-4.029-.072-4.976-.059-.947-.154-1.594-.36-2.181a6.924 6.924 0 00-1.628-2.5A6.924 6.924 0 0019.14.832c-.587-.206-1.234-.301-2.181-.36C16.011.013 15.604 0 12.017 0zm0 5.838a6.18 6.18 0 110 12.36 6.18 6.18 0 010-12.36zm0 10.18a3.999 3.999 0 100-7.998 3.999 3.999 0 000 7.998zm7.846-10.405a1.441 1.441 0 11-2.883 0 1.441 1.441 0 012.883 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Instagram</h3>
                            <p class="text-gray-600">@rabbiansyah_</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Lihat behind-the-scenes coding life dan project showcase</p>
                    <a href="https://www.instagram.com/rabbiansyah_/" target="_blank"
                        class="inline-flex items-center text-pink-500 hover:text-pink-600 font-medium text-sm">
                        Follow di Instagram
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Response Time Info -->
            <div class="bg-gray-100 rounded-xl p-6 text-center">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                    <span class="text-gray-700 font-medium">Biasanya merespon dalam 24 jam</span>
                </div>
                <p class="text-gray-600 text-sm">
                    Saya selalu berusaha merespon setiap pesan dengan cepat. Untuk project collaboration atau
                    diskusi teknis mendalam, lebih baik via email atau LinkedIn ya!
                </p>
            </div>
        </div>
    </section>
</body>
</html>
