<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ConsultationsChart extends ChartWidget
{
    protected static ?int $sort = 2;
    protected ?string $heading = 'Tren Konsultasi Bulanan';

    protected function getData(): array
    {
        $data = \Flowframe\Trend\Trend::model(\App\Models\Consultation::class)
            ->between(
                start: now()->subMonths(6),
                end: now(),
            )
            ->perMonth()
            ->count();
 
        return [
            'datasets' => [
                [
                    'label' => 'Konsultasi Masuk',
                    'data' => $data->map(fn (\Flowframe\Trend\TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (\Flowframe\Trend\TrendValue $value) => \Carbon\Carbon::parse($value->date)->translatedFormat('M Y')),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
