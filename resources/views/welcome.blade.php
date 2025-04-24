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
