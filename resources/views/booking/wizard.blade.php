@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white rounded-lg shadow p-6">
    <div class="border-b-4 border-blue-500 pb-4 mb-6">
        <h1 class="text-2xl font-bold">Boeking afronden</h1>
        <div class="text-gray-600 text-sm mt-1">U heeft gekozen voor: <span class="font-semibold">{{ $package->name }}</span></div>
    </div>
    <!-- Stappenbalk -->
   
    <!-- Livewire wizard component -->
    @livewire('booking.booking-wizard', ['package' => $package])
</div>
@endsection
