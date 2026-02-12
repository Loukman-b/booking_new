<?php
namespace App\Livewire\Booking;

use App\Models\Package;
use App\Models\TimeSlot;
use Livewire\Component;

class DateTimeStep extends Component
{
    public Package $package;
    public $dates = [];
    public $selectedDate = null;
    public $timeSlots = [];
    public $selectedTimeSlot = null;

    public function mount(Package $package)
    {
        $this->package = $package;
        // Haal alle unieke datums met beschikbare tijdsloten op
        $datesCollection = TimeSlot::where('package_id', $package->id)
            ->where('status', 'available')
            ->orderBy('start_time')
            ->get()
            ->groupBy(fn($slot) => $slot->start_time->format('Y-m-d'));
        $this->dates = $datesCollection->toArray();
        // Standaard: selecteer eerste datum als beschikbaar
        if (count($this->dates)) {
            $this->selectedDate = array_key_first($this->dates);
            $this->updateTimeSlots();
        }
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->selectedTimeSlot = null;
        $this->updateTimeSlots();
    }

    public function selectTimeSlot($slotId)
    {
        $this->selectedTimeSlot = $slotId;
    }

    public function updateTimeSlots()
    {
        $this->timeSlots = $this->dates[$this->selectedDate] ?? collect();
    }

    public function render()
    {
        return view('livewire.booking.date-time-step');
    }
}
