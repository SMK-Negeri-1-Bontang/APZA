<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.1.8/dist/tailwind.min.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col sm:justify-center items-center pt-8 sm:pt-0 bg-green-100 dark:bg-gray-900 text-black antialiased">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-black" />
            </a>
        </div>

        <div class="w-full sm:max-w-2xl mt-6 px-25 py-8 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            @yield('content')
        </div>
    </body>
</html>
