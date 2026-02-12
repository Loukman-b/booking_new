<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Enums\BookingStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('package_id')
                    ->relationship('package', 'name')
                    ->required(),
                Select::make('time_slot_id')
                    ->relationship('timeSlot', 'id')
                    ->required(),
                TextInput::make('customer_name')
                    ->required(),
                TextInput::make('customer_email')
                    ->email()
                    ->required(),
                TextInput::make('customer_phone')
                    ->tel(),
                TextInput::make('price_at_booking')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(BookingStatus::getOptions())
                    ->default(BookingStatus::CONFIRMED->value)
                    ->required(),
            ]);
    }
}
