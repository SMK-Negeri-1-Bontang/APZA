<<<<<<< HEAD
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">
                {{ __('Welcome Back!') }}
            </h2>
            <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">
                {{ __('Status: Online') }}
            </div>
        </div>
 
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-900 shadow-xl rounded-2xl p-8 transition-all hover:shadow-2xl">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">👋 {{ __("You're logged in!") }}</h3>
                <p class="text-gray-600 dark:text-gray-300">Glad to see you again. Explore your dashboard and keep being productive!</p>
            </div>

            <!-- Dashboard Highlights -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <a href="{{ route('absen.create') }}" class="bg-gradient-to-br from-cyan-500 to-blue-500 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">ayo absen</h4>
                    <p class="text-sm">Submit a new absence request.</p>
                </a>
                <!-- Card 2 -->
                <a href="{{ route('kehadiran.chart') }}" class="bg-gradient-to-br from-purple-500 to-pink-500 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">Izin chart </h4>
                    <p class="text-sm">chart izin</p>
                </a>
                <!-- Card 3 -->
                <a href="{{ route('izin.index') }}" class="bg-gradient-to-br from-emerald-500 to-teal-500 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">Laporan</h4>
                    <p class="text-sm">Check new messages, alerts, and updates.</p>
                </a>
            </div>

            <!-- Extra Section: Quick Tips -->
            <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 p-6 rounded-xl mt-6">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">💡 Quick Tips</h4>
                <ul class="list-disc list-inside text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li>Use the top menu to navigate through the app.</li>
                    <li>Dark mode is automatically enabled based on your system preference.</li>
                    <li>Check the Projects tab for your latest updates.</li>
                </ul>
            </div>
        </div>
    </div>

    </x-slot>

</x-app-layout>
=======
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APZA</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Optional custom styles */
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 relative">
            <!-- Background Image -->
            <img id="background" class="absolute left-0 top-0 w-full h-auto " src="https://media.licdn.com/dms/image/v2/C561BAQG8uxfPdN23_Q/company-background_10000/company-background_10000/0/1597893891445/smkn1bontang_cover?e=2147483647&v=beta&t=g3EkRdH_NjzmjxuvuuHep-8Jd9jg6_lohzuhn5r0DFg" alt="Laravel background" />

            <!-- Header/Navbar -->
            <header class="w-full px-6 py-4 flex justify-between items-center bg-white/80 dark:bg-black/70 backdrop-blur-md shadow-md fixed top-0 left-0 z-20">
    <!-- Logo dan Judul -->
    <div class="flex items-center gap-4">
        <img src="https://3.bp.blogspot.com/-gavKyb1tAbE/VjlxeyGbu7I/AAAAAAAAAXU/V0fTfHFIn5A/s1600/logo%2Bsmk1.jpg" alt="Logo" class="w-12 h-12 rounded-full shadow-md object-cover" />
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white"> APZA</h1>
    </div>

    <!-- Navigasi -->
    @if (Route::has('login'))
        <nav class="flex gap-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black dark:text-white hover:text-black/70 dark:hover:text-white/80 ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black dark:text-white hover:text-black/70 dark:hover:text-white/80 ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black dark:text-white hover:text-black/70 dark:hover:text-white/80 ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
>>>>>>> 1e56aac3471cda2014646a8f88859617b6d44f7f
