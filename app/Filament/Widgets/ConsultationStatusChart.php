<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ConsultationStatusChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected ?string $heading = 'Status Konsultasi';

    protected function getData(): array
    {
        $pending = \App\Models\Consultation::where('status', 'pending')->count();
        $processed = \App\Models\Consultation::where('status', 'processed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Konsultasi',
                    'data' => [$pending, $processed],
                    'backgroundColor' => ['#f59e0b', '#10b981'], // warning and success colors
                ],
            ],
            'labels' => ['Pending', 'Selesai'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
