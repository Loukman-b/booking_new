
@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white rounded-lg shadow p-6">
    <!-- Header -->
    <div class="border-b-4 border-blue-500 pb-4 mb-6">
        <h1 class="text-2xl font-bold">Boeking afronden</h1>
        <div class="text-gray-600 text-sm mt-1">U heeft gekozen voor: <span class="font-semibold">{{ $package->name }}</span></div>
    </div>
    <!-- Stappenbalk -->
    <div class="flex justify-between items-center mb-8">
        <div class="flex-1 flex flex-col items-center">
            <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg shadow">1</div>
            <span class="mt-2 text-blue-700 font-semibold">Datum & tijd</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center font-bold text-lg">2</div>
            <span class="mt-2 text-gray-400">Persoonlijke gegevens</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center font-bold text-lg">3</div>
            <span class="mt-2 text-gray-400">Betaling</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center font-bold text-lg">4</div>
            <span class="mt-2 text-gray-400">Bevestiging</span>
        </div>
    </div>
    <!-- Livewire component -->
    @livewire('booking.date-time-step', ['package' => $package])
</div>
@endsection
