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
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300 h-full flex flex-col hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9 text-transparent bg-gradient-to-br from-blue-500 to-blue-700 bg-clip-text" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke="url(#gradient1)" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            <defs><linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pakketen</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed flex-grow">
                        Bekijk alle pakketten, prijzen en duur. Kies wat bij je past.
                    </p>
                    <a href="#pakketten" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Bekijk onze pakketen
                    </a>
                </div>

                <!-- Card 2: Beschikbare tijdsloten -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300 h-full flex flex-col hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke="url(#gradient2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="14" r="1" fill="url(#gradient2)"/>
                            <circle cx="16" cy="14" r="1" fill="url(#gradient2)"/>
                            <defs><linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Beschikbare tijdsloten</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed flex-grow">
                        Zie welke momenten nog vrij zijn en reserveer direct een plek.
                    </p>
                    <a href="#tijdsloten" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Bekijk tijdsloten
                    </a>
                </div>

                <!-- Card 3: Boek een afspraak -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300 h-full flex flex-col hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke="url(#gradient3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 12h6m-6 4h6" stroke="url(#gradient3)" stroke-width="2" stroke-linecap="round"/>
                            <defs><linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#60a5fa"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Boek een afspraak</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed flex-grow">
                        Vul je gegevens in, kies een pakket en bevestig je boeking. Snel en eenvoudig geregeld.
                    </p>
                    <a href="#boeken" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Nu boeken
                    </a>
                </div>

                <!-- Card 4: Betaling en bevestiging -->
                <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition duration-300 h-full flex flex-col hover:scale-105">
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
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed flex-grow">
                        Betaal veilig en ontvang meteen je bevestiging van de afspraak.
                    </p>
                    <a href="#info" class="inline-block w-full text-center px-4 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                        Meer info
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Waarom kiezen voor Atlas Booking -->
    <section class="py-20" style="background-color: #01132B;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl lg:text-5xl font-bold text-white text-center mb-16">
                Waarom kiezen voor <span class="text-blue-400">Atlas</span> Booking?
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Punt 1 -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-1">
                            Geen account nodig voor klanten
                        </h3>
                    </div>
                </div>

                <!-- Punt 2 -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-1">
                            Direct overzicht van beschikbare tijdssloten
                        </h3>
                    </div>
                </div>

                <!-- Punt 3 -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-1">
                            Geen dubbele boekingen
                        </h3>
                    </div>
                </div>

                <!-- Punt 4 -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-1">
                            Snelle bevestiging na reserveren
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Zo werkt Atlas Booking -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                    Zo werkt <span class="text-blue-600">Atlas</span> Booking
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    In vier eenvoudige stappen regel je een afspraak, zonder account en zonder gedoe
                </p>
            </div>

            <!-- Stappen timeline -->
            <div class="relative">
                <!-- Verbindingslijn (desktop) -->
                <div class="hidden lg:block absolute top-16 left-0 right-0 h-1 bg-blue-200" style="width: calc(100% - 200px); margin-left: 100px;"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Stap 1: Kies een pakket -->
                    <div class="relative">
                        <div class="flex flex-col items-center">
                            <!-- Nummer cirkel -->
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg mb-6 relative z-10">
                                <span class="text-2xl font-bold text-white">1</span>
                            </div>
                            
                            <!-- Card -->
                            <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full hover:shadow-xl transition duration-300 h-full flex flex-col hover:scale-105">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none">
                                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke="url(#grad1)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <defs><linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#3b82f6"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Kies een pakket</h3>
                                <p class="text-sm text-gray-600 flex-grow">
                                    Selecteer een pakket dat past bij jouw wensen, inclusief prijs en duur van de afspraak
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stap 2: Datum & tijd -->
                    <div class="relative">
                        <div class="flex flex-col items-center">
                            <!-- Nummer cirkel -->
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg mb-6 relative z-10">
                                <span class="text-2xl font-bold text-white">2</span>
                            </div>
                            
                            <!-- Card -->
                            <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full hover:shadow-xl transition duration-300 h-full flex flex-col hover:scale-105">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke="url(#grad2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <defs><linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#3b82f6"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Datum & tijd</h3>
                                <p class="text-sm text-gray-600 flex-grow">
                                    Kies een beschikbare datum en tijdslot dat het beste bij je agenda past
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stap 3: Persoonlijke gegevens -->
                    <div class="relative">
                        <div class="flex flex-col items-center">
                            <!-- Nummer cirkel -->
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg mb-6 relative z-10">
                                <span class="text-2xl font-bold text-white">3</span>
                            </div>
                            
                            <!-- Card -->
                            <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full hover:shadow-xl transition duration-300 h-full flex flex-col hover:scale-105">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke="url(#grad3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <defs><linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#3b82f6"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Persoonlijke gegevens</h3>
                                <p class="text-sm text-gray-600 flex-grow">
                                    Vul je contactgegevens in voor de bevestiging en communicatie over je reservering
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stap 4: Betaling en afronding -->
                    <div class="relative">
                        <div class="flex flex-col items-center">
                            <!-- Nummer cirkel -->
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg mb-6 relative z-10">
                                <span class="text-2xl font-bold text-white">4</span>
                            </div>
                            
                            <!-- Card -->
                            <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full hover:shadow-xl transition duration-300 h-full flex flex-col hover:scale-105">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none">
                                        <path d="M9 5l7 7-7 7" stroke="url(#grad4)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 12h12" stroke="url(#grad4)" stroke-width="2" stroke-linecap="round"/>
                                        <circle cx="12" cy="12" r="9" stroke="url(#grad4)" stroke-width="2"/>
                                        <defs><linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#3b82f6"/><stop offset="100%" style="stop-color:#1d4ed8"/></linearGradient></defs>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Betaling en afronding</h3>
                                <p class="text-sm text-gray-600 flex-grow">
                                    Rond je reservering af met een veilige betaling en ontvang direct je bevestiging
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Onze Pakketten -->
    <section class="py-20" style="background-color: #01132B;" id="pakketten">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    Onze pakketten
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Kies een Pakket die past bij jouw wensen. Alle prijzen zijn vooraf duidelijk
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Basic Pakket -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:scale-105 transition duration-300">
                    <div class="p-8">
                        <h3 class="text-3xl font-bold text-gray-900 text-center mb-6">Basic</h3>
                        
                        <div class="text-center mb-8">
                            <span class="text-5xl font-bold text-gray-900">€49</span>
                            <span class="text-xl text-gray-600">/maand</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Tot 50 boekingen per maand</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">1 medewerker account</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">E-mail notificaties</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Basis kalender overzicht</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">E-mail ondersteuning</span>
                            </li>
                        </ul>

                        <a href="#boeken" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                            Kies Basic
                        </a>
                    </div>
                </div>

                <!-- Pro Pakket (Featured) -->
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden hover:scale-105 transition duration-300 relative border-4 border-blue-500">
                    <div class="absolute top-0 left-0 right-0 bg-blue-600 text-white text-center py-2 text-sm font-semibold">
                        Meest Populair
                    </div>
                    <div class="p-8 pt-12">
                        <h3 class="text-3xl font-bold text-blue-600 text-center mb-6">Pro</h3>
                        
                        <div class="text-center mb-8">
                            <span class="text-5xl font-bold text-gray-900">€99</span>
                            <span class="text-xl text-blue-600">/maand</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Tot 200 boekingen per maand</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Tot 5 medewerker accounts</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">E-mail & SMS notificaties</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Google Calendar integratie</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Basis rapportages & analytics</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Prioriteit ondersteuning</span>
                            </li>
                        </ul>

                        <a href="#boeken" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                            Kies Pro
                        </a>
                    </div>
                </div>

                <!-- Premium Pakket -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:scale-105 transition duration-300">
                    <div class="p-8">
                        <h3 class="text-3xl font-bold text-center mb-6" style="color: #FF8C00;">Premium</h3>
                        
                        <div class="text-center mb-8">
                            <span class="text-5xl font-bold text-gray-900">€199</span>
                            <span class="text-xl" style="color: #FF8C00;">/maand</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Onbeperkte boekingen</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Onbeperkt medewerker accounts</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Alle notificatie opties</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Volledige kalender integraties</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Geavanceerde analytics & rapporten</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Eigen branding & huisstijl</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">Dedicated account manager</span>
                            </li>
                        </ul>

                        <a href="#boeken" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-700 hover:from-blue-500 hover:to-blue-800 text-white font-semibold rounded-lg transition duration-150">
                            Kies Premium
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
