<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
        Betaling
    </h2>
    <form wire:submit.prevent="payAndFinish">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Betaalmethodes -->
            <div class="flex-1 flex flex-col gap-4">
                <label class="cursor-pointer">
                    <input type="radio" wire:model="paymentMethod" value="iDEAL" class="sr-only" />
                    <div class="w-full px-4 py-3 rounded-lg border flex items-center gap-3 @if($paymentMethod === 'iDEAL') border-blue-600 bg-blue-50 text-blue-700 font-semibold @else border-gray-200 bg-gray-50 text-gray-700 @endif">
                        <span>
                            <i class="fa-brands fa-ideal fa-lg @if($paymentMethod === 'iDEAL') text-pink-600 @else text-gray-400 @endif"></i>
                        </span>
                        iDEAL <span class="ml-2 text-xs bg-green-100 text-green-700 rounded px-2 py-1">Meest gekozen</span>
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" wire:model="paymentMethod" value="Bancontact" class="sr-only" />
                    <div class="w-full px-4 py-3 rounded-lg border flex items-center gap-3 @if($paymentMethod === 'Bancontact') border-blue-600 bg-blue-50 text-blue-700 font-semibold @else border-gray-200 bg-gray-50 text-gray-700 @endif">
                        <span>
                            <i class="fa-solid fa-money-check fa-lg @if($paymentMethod === 'Bancontact') text-yellow-500 @else text-gray-400 @endif"></i>
                        </span>
                        Bancontact
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" wire:model="paymentMethod" value="Creditcard" class="sr-only" />
                    <div class="w-full px-4 py-3 rounded-lg border flex items-center gap-3 @if($paymentMethod === 'Creditcard') border-blue-600 bg-blue-50 text-blue-700 font-semibold @else border-gray-200 bg-gray-50 text-gray-700 @endif">
                        <span>
                            <i class="fa-solid fa-credit-card fa-lg @if($paymentMethod === 'Creditcard') text-blue-500 @else text-gray-400 @endif"></i>
                        </span>
                        Creditcard
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" wire:model="paymentMethod" value="PayPal" class="sr-only" />
                    <div class="w-full px-4 py-3 rounded-lg border flex items-center gap-3 transition-colors duration-200 relative @if($paymentMethod === 'PayPal') border-blue-600 bg-blue-100 text-blue-700 font-semibold shadow-lg ring-2 ring-blue-400 @else border-gray-200 bg-gray-50 text-gray-700 @endif">
                        <span>
                            <i class="fa-brands fa-paypal fa-lg @if($paymentMethod === 'PayPal') text-blue-600 @else text-gray-400 @endif"></i>
                        </span>
                        PayPal
                        @if($paymentMethod === 'PayPal')
                            <span class="absolute top-2 right-2"><i class="fa-solid fa-circle-check text-blue-600 fa-lg"></i></span>
                        @endif
                    </div>
                </label>
            </div>
            <!-- Overzicht boeking -->
            <div class="flex-1">
                <div class="bg-gray-50 border border-gray-200 rounded p-4 mb-4">
                    <div class="font-semibold mb-1">Overzicht boeking</div>
                    <div class="text-sm text-gray-700">
                        Pakket: <span class="font-bold">{{ $package->name }}</span><br>
                        Datum: <span class="font-bold">{{ $selectedDate ? \Carbon\Carbon::parse($selectedDate)->translatedFormat('l d F Y') : '-' }}</span><br>
                        Tijd: <span class="font-bold">
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
                        </span><br>
                        Naam: <span class="font-bold">{{ $name }}</span>
                    </div>
                    <div class="mt-4 text-sm">
                        Pakketprijs <span class="float-right font-bold">€{{ number_format($package->price ?? 0, 2) }}</span><br>
                        Servicekosten <span class="float-right font-bold">€2.50</span><br>
                        <span class="font-bold">Totaal</span> <span class="float-right text-blue-700 font-bold text-lg">€{{ number_format(($package->price ?? 0) + 2.50, 2) }}</span>
                    </div>
                    <div class="mt-4 text-xs text-gray-500 bg-blue-50 border border-blue-200 rounded p-2">
                        U ontvangt een bevestiging per e-mail na succesvolle betaling
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700" @if(!$paymentMethod) disabled @endif>Betalen</button>
        </div>
    </form>
</div>
