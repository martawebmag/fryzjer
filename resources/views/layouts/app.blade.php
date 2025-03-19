<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Panel rezerwacji') - Fryzjer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS (Breeze już dodaje to automatycznie, więc tylko to potwierdzamy) -->

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/app.js')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Pasek nawigacyjny -->
    <nav class="bg-purple-950 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center text-white text-2xl font-bold space-x-2">
                <img src="{{ asset('build/assets/logo.jpg') }}" alt="Logo" class="w-10 h-10 rounded-md"> <!-- Załóżmy, że masz plik logo.png -->
                <span>Fryzjer</span>
            </a>

            <div class="space-x-6">
                @auth
                    <a href="{{ route('appointments.index') }}" class="text-white hover:text-purple-200">Wizyty</a>

                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('services.index') }}" class="text-white hover:text-purple-200">Usługi</a>
                    @endif

               
                    <!-- Link do wylogowania dla zalogowanego użytkownika -->
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="text-white hover:text-purple-200">
                        Wyloguj
                    </a>

                    <!-- Formularz wylogowania -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <!-- Linki logowania i rejestracji dla niezalogowanego użytkownika -->
                    <a href="{{ route('login') }}" class="text-white hover:text-purple-200">Zaloguj</a>
                    <a href="{{ route('register') }}" class="text-white hover:text-purple-200">Zarejestruj się</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Główna zawartość strony -->
    <div class="max-w-4xl mx-auto py-8 px-4">
        @yield('content')
    </div>



    <script src="{{ asset ('resources/js/app.js') }}"></script>
</body>
</html>




{{-- <!DOCTYPE html>
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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}
