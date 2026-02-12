<?php

namespace App\Filament\Widgets;

use App\Enums\BookingStatus;
use App\Enums\TimeSlotStatus;
use App\Models\Booking;
use App\Models\TimeSlot;
use App\Models\Package;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class BookingStatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        // Boekingen statistieken
        $bookingsQuery = Booking::query();
        if ($startDate) {
            $bookingsQuery->where('created_at', '>=', Carbon::parse($startDate));
        }
        if ($endDate) {
            $bookingsQuery->where('created_at', '<=', Carbon::parse($endDate)->endOfDay());
        }

        $totalBookings = $bookingsQuery->count();
        $confirmedBookings = (clone $bookingsQuery)->where('status', BookingStatus::CONFIRMED->value)->count();
        $completedBookings = (clone $bookingsQuery)->where('status', BookingStatus::COMPLETED->value)->count();
        $cancelledBookings = (clone $bookingsQuery)->where('status', BookingStatus::CANCELLED->value)->count();

        // Beschikbare timeslots
        $availableSlots = TimeSlot::where('status', TimeSlotStatus::AVAILABLE->value)
            ->where('start_time', '>=', now())
            ->count();

        // Actieve pakketten
        $activePackages = Package::where('active', true)->count();

        return [
            Stat::make('Totaal Boekingen', $totalBookings)
                ->description($confirmedBookings . ' bevestigd, ' . $completedBookings . ' afgerond')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('primary')
                ->chart($this->getBookingsChart($startDate, $endDate)),

            Stat::make('Geannuleerde Boekingen', $cancelledBookings)
                ->description('Van ' . $totalBookings . ' totaal')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color($cancelledBookings > 0 ? 'danger' : 'success'),

            Stat::make('Beschikbare Timeslots', $availableSlots)
                ->description('Komende beschikbare slots')
                ->descriptionIcon('heroicon-o-clock')
                ->color('info'),

            Stat::make('Actieve Pakketten', $activePackages)
                ->description('Beschikbare pakketten')
                ->descriptionIcon('heroicon-o-cube')
                ->color('success'),
        ];
    }

    protected function getBookingsChart(?string $startDate, ?string $endDate): array
    {
        $start = $startDate ? Carbon::parse($startDate) : Carbon::now()->subDays(29);
        $end = $endDate ? Carbon::parse($endDate) : Carbon::now();

        $chart = [];
        $current = $start->copy();

        while ($current <= $end) {
            $date = $current->format('Y-m-d');
            
            $count = Booking::whereDate('created_at', $date)->count();
            $chart[] = $count;
            
            $current->addDay();

            if (count($chart) >= 30) break;
        }

        return $chart;
    }
}
