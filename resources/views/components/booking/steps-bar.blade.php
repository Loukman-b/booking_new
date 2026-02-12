<div class="flex justify-between items-center mb-8">
    <div class="flex-1 flex flex-col items-center">
        <div class="w-10 h-10 rounded-full @if($step === 1) bg-blue-600 text-white @else bg-gray-200 text-gray-400 @endif flex items-center justify-center font-bold text-lg shadow">1</div>
        <span class="mt-2 @if($step === 1) text-blue-700 font-semibold @else text-gray-400 @endif">Tijdslot</span>
    </div>
    <div class="flex-1 flex flex-col items-center">
        <div class="w-10 h-10 rounded-full @if($step === 2) bg-blue-600 text-white @else bg-gray-200 text-gray-400 @endif flex items-center justify-center font-bold text-lg">2</div>
        <span class="mt-2 @if($step === 2) text-blue-700 font-semibold @else text-gray-400 @endif">Persoonlijke gegevens</span>
    </div>
    <div class="flex-1 flex flex-col items-center">
        <div class="w-10 h-10 rounded-full @if($step === 3) bg-blue-600 text-white @else bg-gray-200 text-gray-400 @endif flex items-center justify-center font-bold text-lg">3</div>
        <span class="mt-2 @if($step === 3) text-blue-700 font-semibold @else text-gray-400 @endif">Betaling</span>
    </div>
    <div class="flex-1 flex flex-col items-center">
        <div class="w-10 h-10 rounded-full @if($step === 4) bg-blue-600 text-white @else bg-gray-200 text-gray-400 @endif flex items-center justify-center font-bold text-lg">4</div>
        <span class="mt-2 @if($step === 4) text-blue-700 font-semibold @else text-gray-400 @endif">Bevestiging</span>
    </div>
</div>
