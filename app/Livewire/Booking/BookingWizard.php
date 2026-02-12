<?php
namespace App\Livewire\Booking;

use App\Models\Package;
use App\Models\TimeSlot;
use Livewire\Component;

class BookingWizard extends Component
{
    public $paymentMethod = 'iDEAL';
    public $bookingSaved = false;
    public $bookingId = null;
    public Package $package;
    public $dates = [];
    public $selectedDate = null;
    public $timeSlots = [];
    public $selectedTimeSlot = null;
    public $step = 1;

    // Persoonlijke gegevens
    public $name = '';
    public $email = '';
    public $phone = '';
    public $notes = '';

    public function mount(Package $package)
    {
        $this->package = $package;
        $datesCollection = TimeSlot::where('package_id', $package->id)
            ->where('status', 'available')
            ->orderBy('start_time')
            ->get()
            ->groupBy(fn($slot) => $slot->start_time->format('Y-m-d'));
        $this->dates = $datesCollection->toArray();
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
        $this->resetErrorBag('selectedTimeSlot');
    }

    public function updateTimeSlots()
    {
        $this->timeSlots = $this->dates[$this->selectedDate] ?? [];
    }

    public function nextStep()
    {
        if ($this->step === 1) {
            // Validatie voor stap 1: datum en tijdslot moeten gekozen zijn
            if (!$this->selectedDate || !$this->selectedTimeSlot) {
                $this->addError('selectedTimeSlot', 'Selecteer een datum en tijdslot.');
                return;
            }
        }
        $this->resetErrorBag('selectedTimeSlot');
        if ($this->step === 2) {
            // Validatie voor stap 2: persoonlijke gegevens
            $this->validate([
                'name' => 'required|string|min:2',
                'email' => 'required|email',
                'phone' => 'required|string|min:6',
            ]);
            // Sla booking direct op (pending)
            $booking = new \App\Models\Booking();
            $booking->package_id = $this->package->id;
            $booking->time_slot_id = $this->selectedTimeSlot;
            $booking->customer_name = $this->name;
            $booking->customer_email = $this->email;
            $booking->customer_phone = $this->phone;
            $booking->price_at_booking = $this->package->price ?? 0;
            $booking->status = 'pending';
            $booking->save();
            $this->bookingId = $booking->id;
        }
        $this->step++;

    }

    public function payAndFinish()
    {
        // Maak payment record aan bij betalen
        $booking = \App\Models\Booking::find($this->bookingId);
        if (!$booking) return;
        $payment = new \App\Models\Payment();
        $payment->booking_id = $booking->id;
        $payment->amount = ($this->package->price ?? 0) + 2.50;
        $payment->payment_method = $this->paymentMethod;
        $payment->paid_at = now();
        $payment->save();
        // Zet booking op betaald
        $booking->status = 'paid';
        $booking->save();
        // Zet het geboekte tijdslot direct op geboekt
        $timeSlot = \App\Models\TimeSlot::find($booking->time_slot_id);
        if ($timeSlot) {
            $timeSlot->status = 'booked';
            $timeSlot->save();
        }
        $this->bookingSaved = true;
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function redirectToPackages()
    {
        return redirect()->route('home', ['section' => 'packages']);
    }

    public function render()
    {
        return view('livewire.booking.wizard');
    }
}
