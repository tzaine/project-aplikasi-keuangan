<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::incomes()->get()->sum('jumlah');
        $pengeluaran = Transaction::expenses()->get()->sum('jumlah');
    
        return [
            Stat::make('Total Pemasukan',  'Rp ' . number_format($pemasukan, 2, ',', '.'))
            ->description('Pemasukan kamu')  
            ->descriptionIcon('heroicon-m-arrow-trending-up',)
            ->color('success'),

            Stat::make('Total Pengeluaran','Rp ' . number_format($pengeluaran, 2, ',', '.'))
            ->description('Pengeluaran kamu')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),

            Stat::make('Sisa',             'Rp ' . number_format($pemasukan - $pengeluaran, 2, ',', '.'))
            ->description('Sisa nya')
            ->descriptionIcon('heroicon-m-equals')
            ->color('primary'),
        ];
    }
}
