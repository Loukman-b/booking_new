<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boekingsbevestiging</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 24px; }
        .nummer { background: #2563eb; color: #fff; padding: 12px; border-radius: 8px; font-size: 20px; margin-bottom: 16px; }
        .details { background: #f3f4f6; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 16px; }
        .details .row { margin-bottom: 8px; }
        .label { font-weight: bold; color: #2563eb; }
        .value { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Boeking bevestigd!</h2>
        <p>Uw boeking is succesvol afgerond.<br>U ontvangt een bevestiging per e-mail.</p>
    </div>
    <div class="nummer">
        Boekingsnummer: {{ $booking->id }}
    </div>
    <div class="details">
        <div class="row"><span class="label">Pakket:</span> <span class="value">{{ $booking->package->name ?? '-' }}</span></div>
        <div class="row"><span class="label">Datum:</span> <span class="value">{{ $booking->timeSlot ? $booking->timeSlot->start_time->translatedFormat('l d F Y') : '-' }}</span></div>
        <div class="row"><span class="label">Tijdslot:</span> <span class="value">{{ $booking->timeSlot ? $booking->timeSlot->start_time->format('H:i') . ' - ' . $booking->timeSlot->end_time->format('H:i') : '-' }}</span></div>
        <div class="row"><span class="label">Contactpersoon:</span> <span class="value">{{ $booking->customer_name }}</span></div>
        <div class="row"><span class="label">Email:</span> <span class="value">{{ $booking->customer_email }}</span></div>
        <div class="row"><span class="label">Telefoonnummer:</span> <span class="value">{{ $booking->customer_phone }}</span></div>
        <div class="row"><span class="label">Betaalmethode:</span> <span class="value">{{ $booking->payment->payment_method ?? '-' }}</span></div>
    </div>
    <div class="details">
        <div class="row">Pakketprijs <span class="value">€{{ number_format($booking->price_at_booking ?? 0, 2) }}</span></div>
        <div class="row">Servicekosten <span class="value">€2.50</span></div>
        <div class="row"><span class="label">Totaal:</span> <span class="value">€{{ number_format(($booking->price_at_booking ?? 0) + 2.50, 2) }}</span></div>
    </div>
</body>
</html>
