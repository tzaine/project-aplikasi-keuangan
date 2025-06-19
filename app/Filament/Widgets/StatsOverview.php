<?php

namespace App\Filament\Widgets;

use \Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
// use App\Filament\Widgets\WidgetExpenseChart;
// use App\Filament\Widgets\WidgetIncomeChart;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
          $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        $pemasukan = Transaction::incomes()
                        ->whereBetween('date_transaction', [$startDate, $endDate])
                        ->sum( 'jumlah');

        $pengeluaran = Transaction::expenses()
                        ->whereBetween('date_transaction', [$startDate, $endDate])
                        ->sum( 'jumlah');
        
        return [
            Stat::make('Total Pemasukan',  'Rp ' . number_format($pemasukan, 2, ',', '.'))
            ->description('Pemasukan kamu')  
            ->descriptionIcon('heroicon-m-arrow-trending-up',)
            ->color('success')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            ]),

            Stat::make('Total Pengeluaran','Rp ' . number_format($pengeluaran, 2, ',', '.'))
            ->description('Pengeluaran kamu')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger')
            ->chart([17, 4, 15, 3, 8, 5, 2])
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            ]),

            Stat::make('Sisa',             'Rp ' . number_format($pemasukan - $pengeluaran, 2, ',', '.'))
            ->description('Sisa nya')
            ->descriptionIcon('heroicon-m-equals')
            ->color('primary')
            ->chart([5, 5, 5, 5, 5, 5, 5])
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            ]),

        ];
    }
}
