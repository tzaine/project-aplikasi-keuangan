<?php

// namespace App\Filament\Widgets;

// use Carbon\Carbon;
// use Filament\Widgets\ChartWidget;
// use Filament\Widgets\Concerns\InteractsWithPageFilters;
// use App\Models\Transaction;
// use Flowframe\Trend\Trend;
// use Flowframe\Trend\TrendValue;

// class WidgetIncomeChart extends ChartWidget
// {
//     use InteractsWithPageFilters;
//     protected static ?string $heading = 'Pemasukan';
//     protected static string $color = 'success';

//     protected function getData(): array
//     {
//         $startDate = ! is_null($this->filters['startDate'] ?? null) ?
//             Carbon::parse($this->filters['startDate']) :
//             null;

//         $endDate = ! is_null($this->filters['endDate'] ?? null) ?
//             Carbon::parse($this->filters['endDate']) :
//             now();
        
//             $data = Trend::query(Transaction::incomes()) // Kirim Builder langsung
//                 ->between(
//                     start: $startDate,
//                     end: $endDate,
//                 )
//                 ->perDay()
//                 ->sum('jumlah');

//             return [
//                 'datasets' => [
//                     [
//                         'label' => 'Pemasukan per Hari',
//                         'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
//                     ],
//                 ],
//                 'labels' => $data->map(fn (TrendValue $value) => $value->date),
//             ];
//     }

//     protected function getType(): string
//     {
//         return 'bar';
//     }
// }
