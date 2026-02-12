<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atlas Booking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Bedrijfsnaam -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">
                        <span class="text-blue-600">Atlas</span>
                        <span class="text-black">Booking</span>
                    </h1>
                </div>
                <!-- Inloggen knop -->
                <div>
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-medium rounded-lg transition duration-150">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-medium rounded-lg transition duration-150">
                            Inloggen
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="relative">
        @yield('content')
    </main>

    <!-- Scripts (optioneel) -->
    @stack('scripts')
</body>
</html>
