<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use App\Models\Payment;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        // Inkomsten berekenen (Payments)
        $inkomstenQuery = Payment::query();
        if ($startDate) {
            $inkomstenQuery->where('paid_at', '>=', Carbon::parse($startDate));
        }
        if ($endDate) {
            $inkomstenQuery->where('paid_at', '<=', Carbon::parse($endDate)->endOfDay());
        }
        $inkomsten = $inkomstenQuery->sum('amount');

        // Uitgaven berekenen (Expenses)
        $uitgavenQuery = Expense::query();
        if ($startDate) {
            $uitgavenQuery->where('expense_date', '>=', Carbon::parse($startDate));
        }
        if ($endDate) {
            $uitgavenQuery->where('expense_date', '<=', Carbon::parse($endDate));
        }
        $uitgaven = $uitgavenQuery->sum('amount');

        // Omzet berekenen
        $omzet = $inkomsten - $uitgaven;

        return [
            Stat::make('Totale Inkomsten', '€ ' . number_format($inkomsten, 2, ',', '.'))
                ->description('Ontvangen betalingen')
                ->descriptionIcon('heroicon-o-currency-euro')
                ->color('success')
                ->chart($this->getInkomstenChart($startDate, $endDate)),

            Stat::make('Totale Uitgaven', '€ ' . number_format($uitgaven, 2, ',', '.'))
                ->description('Gedane uitgaven')
                ->descriptionIcon('heroicon-o-arrow-trending-down')
                ->color('danger')
                ->chart($this->getUitgavenChart($startDate, $endDate)),

            Stat::make('Omzet', '€ ' . number_format($omzet, 2, ',', '.'))
                ->description('Inkomsten - Uitgaven')
                ->descriptionIcon($omzet >= 0 ? 'heroicon-o-arrow-trending-up' : 'heroicon-o-arrow-trending-down')
                ->color($omzet >= 0 ? 'success' : 'danger')
                ->chart($this->getOmzetChart($startDate, $endDate)),
        ];
    }

    protected function getInkomstenChart(?string $startDate, ?string $endDate): array
    {
        $query = Payment::query()
            ->selectRaw('DATE(paid_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date');

        if ($startDate) {
            $query->where('paid_at', '>=', Carbon::parse($startDate));
        }
        if ($endDate) {
            $query->where('paid_at', '<=', Carbon::parse($endDate)->endOfDay());
        }

        return $query->limit(30)->pluck('total')->toArray();
    }

    protected function getUitgavenChart(?string $startDate, ?string $endDate): array
    {
        $query = Expense::query()
            ->selectRaw('DATE(expense_date) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date');

        if ($startDate) {
            $query->where('expense_date', '>=', Carbon::parse($startDate));
        }
        if ($endDate) {
            $query->where('expense_date', '<=', Carbon::parse($endDate));
        }

        return $query->limit(30)->pluck('total')->toArray();
    }

    protected function getOmzetChart(?string $startDate, ?string $endDate): array
    {
        // Voor de omzet chart combineren we inkomsten en uitgaven per dag
        $start = $startDate ? Carbon::parse($startDate) : Carbon::now()->subDays(29);
        $end = $endDate ? Carbon::parse($endDate) : Carbon::now();

        $chart = [];
        $current = $start->copy();

        while ($current <= $end) {
            $date = $current->format('Y-m-d');
            
            $inkomst = Payment::whereDate('paid_at', $date)->sum('amount');
            $uitgave = Expense::whereDate('expense_date', $date)->sum('amount');
            
            $chart[] = $inkomst - $uitgave;
            $current->addDay();

            if (count($chart) >= 30) break;
        }

        return $chart;
    }
}
