<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'VisionMe') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Lottie -->
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 selection:bg-primary-500 selection:text-white">
    <!-- Navbar -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="/" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center text-white font-bold text-xl group-hover:bg-primary-700 transition-colors shadow-lg shadow-primary-500/30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-primary-900">Vision<span class="text-primary-600">Me</span></span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-primary-600 font-medium transition-colors py-2">Beranda</a>
                    <a href="/#tests" class="text-gray-600 hover:text-primary-600 font-medium transition-colors py-2">Fitur</a>
                    <a href="/shop" class="text-gray-600 hover:text-primary-600 font-medium transition-colors py-2">Toko</a>
                    <a href="/articles" class="text-gray-600 hover:text-primary-600 font-medium transition-colors py-2">Blog</a>
                </nav>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-primary-600 font-medium hover:text-primary-800 transition-colors">Dasbor</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2.5 rounded-full font-medium transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">Daftar</a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="text-gray-500 hover:text-primary-600 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white border-t border-gray-100" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Beranda</a>
                <a href="/#tests" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Fitur</a>
                <a href="/shop" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Toko</a>
                <a href="/articles" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Blog</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="px-5 space-y-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block text-center bg-primary-600 text-white px-3 py-2 rounded-md text-base font-medium">Dasbor</a>
                    @else
                        <a href="{{ route('login') }}" class="block text-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Masuk</a>
                        <a href="{{ route('register') }}" class="block text-center bg-primary-600 text-white px-3 py-2 rounded-md text-base font-medium">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <a href="/" class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center text-white font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl text-white">VisionMe</span>
                    </a>
                    <p class="text-sm text-gray-400">Platform online terpercaya Anda untuk pemeriksaan mata awal, konsultasi, dan belanja kacamata di Indonesia.</p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4 tracking-wider uppercase text-sm">Layanan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/test/visus" class="hover:text-primary-400 transition-colors">Tes Visus</a></li>
                        <li><a href="/test/color_blind" class="hover:text-primary-400 transition-colors">Tes Buta Warna</a></li>
                        <li><a href="/test/astigmatism" class="hover:text-primary-400 transition-colors">Tes Astigmatisme</a></li>
                        <li><a href="/consultation" class="hover:text-primary-400 transition-colors">Konsultasi Online</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4 tracking-wider uppercase text-sm">Perusahaan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="/shop" class="hover:text-primary-400 transition-colors">Produk Kami</a></li>
                        <li><a href="/articles" class="hover:text-primary-400 transition-colors">Blog & Artikel</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Kontak Bantuan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4 tracking-wider uppercase text-sm">Berlangganan</h3>
                    <p class="text-sm text-gray-400 mb-4">Dapatkan tips dan penawaran kesehatan mata terbaru.</p>
                    <div class="flex">
                        <input type="email" placeholder="Email Anda" class="w-full bg-gray-800 border border-gray-700 rounded-l-md px-4 py-2 text-sm focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500">
                        <button class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-r-md text-sm transition-colors">Gabung</button>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} VisionMe Indonesia. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
