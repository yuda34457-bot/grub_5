<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#18181b] text-white">
            <div class="w-full sm:max-w-md px-8 py-10 bg-[#27272a] shadow-xl sm:rounded-2xl border border-white/10">
                <div class="flex flex-col items-center mb-8">
                    <h1 class="text-2xl font-bold text-white tracking-tight">VisionMe</h1>
                    <h2 class="mt-2 text-xl font-bold text-white">Masuk ke Akun Anda</h2>
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
