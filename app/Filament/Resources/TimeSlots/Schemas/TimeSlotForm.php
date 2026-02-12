<?php

namespace App\Filament\Resources\TimeSlots\Schemas;

use App\Enums\TimeSlotStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TimeSlotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('package_id')
                    ->relationship('package', 'name')
                    ->required(),
                DateTimePicker::make('start_time')
                    ->required(),
                DateTimePicker::make('end_time')
                    ->required(),
                Select::make('status')
                    ->options(TimeSlotStatus::getOptions())
                    ->default(TimeSlotStatus::AVAILABLE->value)
                    ->required(),
            ]);
    }
}
