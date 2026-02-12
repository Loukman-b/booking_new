<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-2 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M4 11h16M4 19h16M4 15h16" /></svg>
        Kies een datum en tijdslot
    </h2>
    <p class="text-gray-600 mb-6">Selecteer een beschikbare datum en vervolgens een tijdslot</p>
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Kalender -->
        <div class="bg-white rounded-lg shadow p-4 flex-1">
            <div class="text-center font-semibold mb-2">Februari 2026</div>
            <div class="grid grid-cols-7 gap-1 text-center text-gray-500 text-xs mb-2">
                <div>Zo</div><div>Ma</div><div>Di</div><div>Wo</div><div>Do</div><div>Vr</div><div>Za</div>
            </div>
            <div class="grid grid-cols-7 gap-1 text-center">
                @for($i = 1; $i <= 29; $i++)
                    @php
                        $date = '2026-02-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                        $slots = $dates[$date] ?? [];
                        $available = is_array($slots) ? count($slots) : (method_exists($slots, 'count') ? $slots->count() : 0);
                    @endphp
                    <div class="mb-2">
                        <button type="button"
                            wire:click="selectDate('{{ $date }}')"
                            class="w-10 h-10 rounded-lg border @if($selectedDate === $date) border-blue-700 bg-blue-100 text-blue-900 font-bold @elseif($available > 0) border-blue-500 bg-blue-50 text-blue-700 font-bold hover:bg-blue-100 @else border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed @endif"
                            @if($available === 0) disabled @endif>
                            {{ $i }}
                            <div class="text-xs mt-1 @if($available > 0) text-blue-600 @else text-gray-400 @endif">
                                {{ $available > 0 ? $available . ' plekken' : '' }}
                            </div>
                        </button>
                    </div>
                @endfor
            </div>
            <div class="flex gap-2 mt-2 text-xs">
                <div class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-blue-500 inline-block"></span> Beschikbaar</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-blue-200 inline-block"></span> Geselecteerd</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-gray-200 inline-block"></span> Niet beschikbaar</div>
            </div>
        </div>
        <!-- Tijdsloten -->
        <div class="bg-white rounded-lg shadow p-4 flex-1">
            <div class="text-center font-semibold mb-2">Beschikbare tijdsloten</div>
            <div class="flex flex-col gap-2">
                @forelse($timeSlots as $slot)
                    @php
                        // $slot kan een array of een object zijn
                        $slotObj = is_array($slot) ? (object) $slot : $slot;
                    @endphp
                    <button wire:click="selectTimeSlot({{ $slotObj->id }})"
                        class="w-full px-4 py-2 rounded-lg border @if($selectedTimeSlot == $slotObj->id) border-blue-700 bg-blue-600 text-white font-semibold @else border-blue-200 bg-blue-50 text-blue-700 hover:bg-blue-100 @endif">
                        {{ \Carbon\Carbon::parse($slotObj->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($slotObj->end_time)->format('H:i') }}
                    </button>
                @empty
                    <div class="text-gray-400 text-center py-4">Geen tijdsloten beschikbaar</div>
                @endforelse
            </div>
        </div>
    </div>
    @if($selectedDate && $selectedTimeSlot)
        @php
            // $timeSlots kan array zijn, dus filter handmatig
            $selectedSlot = null;
            foreach ($timeSlots as $slot) {
                $slotObj = is_array($slot) ? (object) $slot : $slot;
                if ($slotObj->id == $selectedTimeSlot) {
                    $selectedSlot = $slotObj;
                    break;
                }
            }
        @endphp
        <div class="mt-4">
            <div class="bg-blue-50 border border-blue-200 rounded p-2 text-blue-700 text-sm">
                Geselecteerd: {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('l d F Y') }} om
                {{ $selectedSlot ? \Carbon\Carbon::parse($selectedSlot->start_time)->format('H:i') : '' }} -
                {{ $selectedSlot ? \Carbon\Carbon::parse($selectedSlot->end_time)->format('H:i') : '' }}
            </div>
        </div>
    @endif
    <form wire:submit.prevent="nextStep">
        <div class="flex justify-end mt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700" @if(!$selectedTimeSlot) disabled @endif>
                Volgende stap
            </button>
        </div>
    </form>
</div>
