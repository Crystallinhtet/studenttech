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

<body class="font-sans min-h-screen text-gray-900 antialiased">
    <div class="bg-gray-900 w-full h-8"></div>
    <header class="text-gray-800 grid grid-cols-2 items-center gap-2 py-3 lg:grid-cols-3 w-full">
        <div class="w-full flex justify-center">
            <img src="{{ asset('assets/images/logo.png') }}">
        </div>
        <div class="flex h-full items-center lg:justify-center lg:col-start-2 text-gray-800">
            <a href="{{route('welcome')}}" class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">Home</a>
            <a href="{{route('contact')}}" class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">Contact</a>
            <a href="{{route('about')}}" class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">About</a>
            <a href="{{route('register')}}"
                class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">Register</a>
       </div>
    </header>

    <main class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="flex">
            <a>
                <img src='{{ asset('assets/images/login-img.png') }}' style="max-height: 600px">
            </a>
            <div class="w-full flex item-center sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

    </main>
    <x-footer/>
</body>

</html>
