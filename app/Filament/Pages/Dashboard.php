<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->label('Van datum')
                            ->native(false)
                            ->default(now()->subDays(30))
                            ->maxDate(fn ($get) => $get('endDate') ?: now()),
                        DatePicker::make('endDate')
                            ->label('Tot datum')
                            ->native(false)
                            ->default(now())
                            ->minDate(fn ($get) => $get('startDate'))
                            ->maxDate(now()),
                    ])
                    ->columns(2),
            ]);
    }

    /**
     * Verberg de standaard Filament widgets
     */
    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverview::class,
            \App\Filament\Widgets\BookingStatsOverview::class,
            \App\Filament\Widgets\RecentBookings::class,
        ];
    }
}
