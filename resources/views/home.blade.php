<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atlas Booking - Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-150">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-150">
                            Inloggen
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="relative">
        <!-- Hero afbeelding met overlay -->
        <div class="relative h-[450px] lg:h-[500px]">
            <!-- Achtergrond afbeelding -->
            <img src="{{ asset('images/hero-handshake.jpg') }}" 
                 alt="Business handshake" 
                 class="absolute inset-0 w-full h-full object-cover">
            
            <!-- Donkere overlay voor betere leesbaarheid -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
            
            <!-- Content bovenop de foto -->
            <div class="relative h-full flex items-start pt-16 lg:pt-24">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-2xl space-y-6">
                        <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                            Welkom bij <span class="text-blue-400">Atlas</span> Booking
                        </h1>
                        
                        <p class="text-lg text-gray-100 leading-relaxed">
                            Van medewerkerplanning tot klant boekingen. Atlas booking brengt alles samen in een gebruiksvriendelijk systeem.
                        </p>
                        
                        <div>
                            <a href="#pakketten" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-150 shadow-lg hover:shadow-xl">
                                Bekijk onze pakketten
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
