<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentBookings extends BaseWidget
{
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Booking::query()
                    ->with(['package', 'timeSlot'])
                    ->where('status', 'confirmed')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Klant')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('customer_email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->toggleable()
                    ->icon('heroicon-o-envelope'),
                    
                Tables\Columns\TextColumn::make('package.name')
                    ->label('Pakket')
                    ->badge()
                    ->toggleable()
                    ->color('info'),
                    
                Tables\Columns\TextColumn::make('timeSlot.start_time')
                    ->label('Starttijd')
                    ->dateTime('d-m-Y H:i')
                    ->toggleable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('price_at_booking')
                    ->label('Prijs')
                    ->money('EUR')
                    ->toggleable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->toggleable()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        'completed' => 'info',
                    }),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Geboekt op')
                    ->dateTime('d-m-Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->heading('Recente Bevestigde Boekingen');
    }
}
