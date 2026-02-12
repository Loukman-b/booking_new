<?php

namespace App\Enums;

enum TimeSlotStatus: string
{
    case AVAILABLE = 'available';
    case BOOKED = 'booked';
    case CANCELLED = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Beschikbaar',
            self::BOOKED => 'Geboekt',
            self::CANCELLED => 'Geannuleerd',
        };
    }

    public static function getOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
