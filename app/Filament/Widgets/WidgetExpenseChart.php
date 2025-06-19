<?php

//  namespace App\Filament\Widgets;
//  use Carbon\Carbon;
//  use Illuminate\Database\Eloquent\Builder;
//  use App\Models\Transaction;
//  use Filament\Widgets\ChartWidget;
//  use Flowframe\Trend\Trend;
//  use Flowframe\Trend\TrendValue;
//  use Filament\Widgets\Concerns\InteractsWithPageFilters;

//  class WidgetExpenseChart extends ChartWidget
//  {
//          protected static ?string $heading = 'Pengeluaran';
//          protected static string $color = 'danger';
//          use InteractsWithPageFilters;
//     protected function getData(): array
//  {
//      $startDate = !is_null($this->filters['startDate'] ?? null)
//          ? Carbon::parse($this->filters['startDate'])
//          : Carbon::now()->subDays(30); // default 30 hari ke belakang

//      $endDate = !is_null($this->filters['endDate'] ?? null)
//          ? Carbon::parse($this->filters['endDate'])
//          : Carbon::now();

//      $data = Trend::query(
//             Transaction::expenses() // Gunakan query builder langsung di sini
//         )
//          ->between(
//              start: $startDate,
//              end: $endDate,
//          )
//          ->perDay()
//          ->sum('jumlah');

//      return [
//          'datasets' => [
//              [
//                  'label' => 'Pengeluaran',
//                  'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
//              ],
//          ],
//          'labels' => $data->map(fn (TrendValue $value) => $value->date),
//      ];
//  }

//      protected function getType(): string
//      {
//          return 'line';
//      }
//  }

