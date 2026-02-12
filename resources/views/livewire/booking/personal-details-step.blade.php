<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
        Persoonlijke gegevens
    </h2>
    <p class="text-gray-600 mb-4">Vul uw contactgegevens in voor de boeking</p>
    <div class="bg-gray-50 border border-gray-200 rounded p-4 mb-6">
        <div class="font-semibold mb-1">Boeking overzicht</div>
        <div class="text-sm text-gray-700">
            Pakket: <span class="font-bold">{{ $package->name }}</span><br>
            Datum: <span class="font-bold">{{ $selectedDate ? \Carbon\Carbon::parse($selectedDate)->translatedFormat('l d F Y') : '-' }}</span><br>
            Tijdslot: <span class="font-bold">
                @php
                    $selectedSlot = null;
                    foreach ($timeSlots as $slot) {
                        $slotObj = is_array($slot) ? (object) $slot : $slot;
                        if ($slotObj->id == $selectedTimeSlot) {
                            $selectedSlot = $slotObj;
                            break;
                        }
                    }
                @endphp
                {{ $selectedSlot ? \Carbon\Carbon::parse($selectedSlot->start_time)->format('H:i') . ' - ' . \Carbon\Carbon::parse($selectedSlot->end_time)->format('H:i') : '-' }}
            </span>
        </div>
    </div>
    <form wire:submit.prevent="nextStep">
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Voornaam *</label>
            <input type="text" wire:model="name" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">E-mail *</label>
            <input type="email" wire:model="email" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Telefoonnummer *</label>
            <input type="text" wire:model="phone" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Opmerkingen of speciale verzoeken (optioneel)</label>
            <textarea wire:model="notes" class="w-full border rounded-lg px-4 py-2" placeholder="Bijvoorbeeld: allergieën, specifieke wensen..."></textarea>
        </div>
        <div class="flex justify-between mt-6">
            <button type="button" wire:click="prevStep" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300">Vorige stap</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">Volgende stap</button>
        </div>
    </form>
    <div class="mt-4 text-xs text-gray-500 bg-blue-50 border border-blue-200 rounded p-2">
        <span class="font-semibold">Privacy:</span> Uw gegevens worden vertrouwelijk behandeld en alleen gebruikt voor het verwerken van uw boeking.
    </div>
</div>
