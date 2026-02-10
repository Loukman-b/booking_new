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
                            <a href="#pakketten" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150 shadow-lg hover:shadow-xl">
                                Bekijk onze pakketten
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Features Section met overlappende cards -->
    <section class="relative bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Cards grid met negatieve margin om over hero te overlappen -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 -mt-32">
                <!-- Card 1: Pakketen -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9 text-transparent bg-gradient-to-br from-blue-500 to-blue-700 bg-clip-text" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke="url(#gradient1)" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            <defs><linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pakketen</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        Bekijk alle pakketten, prijzen en duur. Kies wat bij je past.
                    </p>
                    <a href="#pakketten" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Bekijk onze pakketen
                    </a>
                </div>

                <!-- Card 2: Beschikbare tijdsloten -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke="url(#gradient2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="14" r="1" fill="url(#gradient2)"/>
                            <circle cx="16" cy="14" r="1" fill="url(#gradient2)"/>
                            <defs><linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Beschikbare tijdsloten</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        Zie welke momenten nog vrij zijn en reserveer direct een plek.
                    </p>
                    <a href="#tijdsloten" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Bekijk tijdsloten
                    </a>
                </div>

                <!-- Card 3: Boek een afspraak -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke="url(#gradient3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 12h6m-6 4h6" stroke="url(#gradient3)" stroke-width="2" stroke-linecap="round"/>
                            <defs><linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Boek een afspraak</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        Vul je gegevens in, kies een pakket en bevestig je boeking.
                    </p>
                    <a href="#boeken" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Nu boeken
                    </a>
                </div>

                <!-- Card 4: Betaling en bevestiging -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="5" width="20" height="14" rx="2" stroke="url(#gradient4)" stroke-width="2"/>
                            <path d="M2 10h20" stroke="url(#gradient4)" stroke-width="2"/>
                            <circle cx="7" cy="15" r="1" fill="url(#gradient4)"/>
                            <circle cx="11" cy="15" r="1" fill="url(#gradient4)"/>
                            <defs><linearGradient id="gradient4" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Betaling en bevestiging</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                        Betaal veilig en ontvang meteen je bevestiging van de afspraak.
                    </p>
                    <a href="#info" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Meer info
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
