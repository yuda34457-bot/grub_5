@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-white overflow-hidden pt-12 pb-24 lg:pt-20 lg:pb-32">
    <div class="absolute inset-y-0 right-0 w-1/2 bg-primary-50 rounded-l-full opacity-50 transform translate-x-1/3 -translate-y-12"></div>
    <div class="absolute inset-y-0 left-0 w-64 h-64 bg-primary-100 rounded-full opacity-30 blur-3xl transform -translate-x-1/2 translate-y-1/2"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-50 text-primary-600 font-medium text-sm mb-6 border border-primary-100 shadow-sm">
                    <span class="flex h-2 w-2 rounded-full bg-primary-500 animate-pulse"></span>
                    Ambil Tes Mata Online Anda
                </div>
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:leading-tight">
                    <span class="block text-gray-900">Penglihatan Lebih Baik,</span>
                    <span class="block text-primary-600 mt-2">Hidup Lebih Baik</span>
                </h1>
                <p class="mt-4 text-base text-gray-500 sm:mt-6 sm:text-lg sm:max-w-xl sm:mx-auto md:text-xl lg:mx-0">
                    Ketahui kesehatan mata Anda dari kenyamanan rumah. VisionMe menyediakan tes mata awal yang cepat, dapat diandalkan, dan gratis termasuk Visus, Buta Warna, dan Astigmatisme.
                </p>
                <div class="mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0 flex flex-col sm:flex-row gap-4">
                    <a href="#tests" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-medium rounded-full shadow-lg shadow-primary-500/30 text-white bg-primary-600 hover:bg-primary-700 hover:-translate-y-0.5 transition-all w-full sm:w-auto">
                        Mulai Tes Gratis
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="/shop" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-gray-200 text-base font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 transition-all w-full sm:w-auto">
                        Lihat Kacamata
                    </a>
                </div>
                <div class="mt-8 flex items-center gap-4 sm:justify-center lg:justify-start">
                    <div class="flex -space-x-2">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=4" alt="User">
                    </div>
                    <div class="text-sm font-medium text-gray-500">
                        Bergabunglah dengan <span class="text-primary-600 font-bold">10,000+</span> pengguna yang memeriksa penglihatan mereka hari ini.
                    </div>
                </div>
            </div>
            <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                <div class="relative mx-auto w-full rounded-2xl shadow-2xl lg:max-w-md overflow-hidden bg-white border border-gray-100 transform hover:scale-105 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Pemeriksaan Mata" class="w-full h-[400px] object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Available Tests Section -->
<section id="tests" class="py-20 bg-gray-50 border-t border-gray-100 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-base text-primary-600 font-semibold tracking-wide uppercase">Layanan Kami</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Pemeriksaan Mata Komprehensif
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                Pilih tes di bawah ini untuk memeriksa penglihatan Anda. Cepat, gratis, dan memberikan hasil instan.
            </p>
        </div>

        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Visus Test Card -->
                <div class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Tes Visus (Ketajaman)</h3>
                        <p class="text-gray-500 mb-8 line-clamp-3">Periksa ketajaman penglihatan Anda. Tes ini menggunakan metodologi standar grafik Snellen untuk menentukan apakah Anda membutuhkan kacamata atau resep baru.</p>
                        <a href="/test/visus" class="inline-flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                            Mulai Tes
                            <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Color Blind Test Card -->
                <div class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Tes Buta Warna</h3>
                        <p class="text-gray-500 mb-8 line-clamp-3">Ketahui apakah Anda memiliki defisiensi penglihatan warna. Kami menggunakan pelat warna Ishihara untuk menguji kemampuan Anda membedakan warna.</p>
                        <a href="/test/color_blind" class="inline-flex items-center text-rose-500 font-semibold group-hover:text-rose-600">
                            Mulai Tes
                            <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Astigmatism Test Card -->
                <div class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Tes Astigmatisme</h3>
                        <p class="text-gray-500 mb-8 line-clamp-3">Periksa astigmatisme, ketidaksempurnaan umum pada kelengkungan mata Anda yang menyebabkan penglihatan jarak jauh dan dekat menjadi kabur.</p>
                        <a href="/test/astigmatism" class="inline-flex items-center text-amber-500 font-semibold group-hover:text-amber-600">
                            Mulai Tes
                            <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-primary-600 relative overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2">
        <div class="w-64 h-64 bg-primary-500 rounded-full opacity-50 blur-3xl"></div>
    </div>
    <div class="absolute bottom-0 right-0 transform translate-x-1/2 translate-y-1/2">
        <div class="w-96 h-96 bg-primary-700 rounded-full opacity-50 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 relative z-10">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="lg:w-1/2 text-center lg:text-left">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Siap untuk penglihatan yang lebih jelas?</span>
                    <span class="block text-primary-200 mt-2">Dapatkan hasil PDF resmi Anda hari ini.</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-primary-100">
                    Daftar sekarang untuk menyimpan riwayat tes Anda, berkonsultasi dengan dokter spesialis mata kami, dan membuka diskon eksklusif di toko kacamata kami.
                </p>
            </div>
            <div class="mt-8 flex justify-center lg:mt-0 lg:flex-shrink-0 lg:justify-end gap-4">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-medium rounded-full text-primary-700 bg-white hover:bg-gray-50 shadow-xl transition-all transform hover:-translate-y-0.5">
                    Buat Akun Gratis
                </a>
                <a href="/consultation" class="inline-flex items-center justify-center px-8 py-3.5 border border-primary-300 text-base font-medium rounded-full text-white hover:bg-primary-500 transition-all">
                    Bicara dengan Ahli
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
