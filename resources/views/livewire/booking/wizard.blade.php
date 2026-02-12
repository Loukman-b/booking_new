<div class="w-full">

@include('components.booking.steps-bar', ['step' => $step])


@if($step === 3)
    @include('livewire.booking.payment-step')
@endif

@if($step === 4)
    {{-- Stap 4: Bevestiging --}}
    <div class="bg-white rounded-lg shadow p-8 flex flex-col items-center">
        <div class="bg-blue-100 rounded-full p-4 mb-4">
            <i class="fa-solid fa-circle-check fa-3x text-blue-600"></i>
        </div>
        <h2 class="text-2xl font-bold text-blue-700 mb-2">Boeking bevestigd!</h2>
        <p class="text-gray-700 mb-6 text-center">Uw boeking is succesvol afgerond. U ontvangt een bevestigingsmail op <span class="font-semibold">{{ $email }}</span>.</p>
        <div class="w-full max-w-md">
            <div class="bg-blue-600 rounded-lg p-4 mb-6 text-white">
                <div class="text-xs">Boekingsnummer</div>
                <div class="text-2xl font-bold tracking-wider mb-1">{{ $bookingId ?? '---' }}</div>
                <div class="text-xs opacity-80">Bewaar dit nummer voor uw administratie</div>
            </div>
            <div class="bg-white border border-gray-200 rounded p-4 mb-6">
                <div class="font-semibold mb-2">Boekingsdetails</div>
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-box fa-lg text-blue-600"></i>
                        <span>Pakket</span>
                        <span class="font-bold ml-auto">{{ $package->name }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days fa-lg text-blue-600"></i>
                        <span>Datum</span>
                        <span class="font-bold ml-auto">{{ $selectedDate ? \Carbon\Carbon::parse($selectedDate)->translatedFormat('l d F Y') : '-' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-clock fa-lg text-blue-600"></i>
                        <span>Tijdslot</span>
                        <span class="font-bold ml-auto">
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
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-user fa-lg text-blue-600"></i>
                        <span>Contactpersoon</span>
                        <span class="font-bold ml-auto">{{ $name }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-envelope fa-lg text-blue-600"></i>
                        <span>Email</span>
                        <span class="font-bold ml-auto">{{ $email }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-phone fa-lg text-blue-600"></i>
                        <span>Telefoonnummer</span>
                        <span class="font-bold ml-auto">{{ $phone }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-credit-card fa-lg text-blue-600"></i>
                        <span>Betaalmethode</span>
                        <span class="font-bold ml-auto">{{ $paymentMethod }}</span>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    Pakketprijs <span class="float-right font-bold">€{{ number_format($package->price ?? 0, 2) }}</span><br>
                    Servicekosten <span class="float-right font-bold">€2.50</span><br>
                    <span class="font-bold">Totaal</span> <span class="float-right text-blue-700 font-bold text-lg">€{{ number_format(($package->price ?? 0) + 2.50, 2) }}</span>
                </div>
            </div>
            <div class="flex gap-2 justify-center mt-4">
                <a href="{{ route('home') }}" class="px-6 py-2 bg-white border border-gray-300 rounded-lg font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="{{ route('booking.download', $bookingId) }}" class="px-6 py-2 bg-white border border-gray-300 rounded-lg font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-download"></i> Download Bevestiging
                </a>
                <button wire:click="redirectToPackages" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Nieuwe boeking
                </button>
            </div>
        </div>
    </div>
@endif

@if($step === 1)
    @include('livewire.booking.date-time-step')
@endif
@if($step === 2)
    @include('livewire.booking.personal-details-step')
@endif

</div>
