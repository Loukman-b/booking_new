<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function start(Package $package)
    {
        // Toon de BookingWizard Livewire component (meerdere stappen)
        return view('booking.wizard', compact('package'));
    }

    public function download(Booking $booking)
    {
        $pdf = Pdf::loadView('booking.confirmation-pdf', ['booking' => $booking]);
        return $pdf->download('bevestiging_' . $booking->id . '.pdf');
    }
}
