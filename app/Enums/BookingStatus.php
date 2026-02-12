<?php

namespace App\Enums;

enum BookingStatus: string
{
    case CONFIRMED = 'confirmed';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';

    public function getLabel(): string
    {
        return match ($this) {
            self::CONFIRMED => 'Bevestigd',
            self::CANCELLED => 'Geannuleerd',
            self::COMPLETED => 'Voltooid',
        };
    }

    public static function getOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
