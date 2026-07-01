<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Consultasi', \App\Models\Consultation::count())
                ->description('Semua konsultasi yang masuk')
                ->descriptionIcon('heroicon-m-inbox')
                ->color('primary'),
            Stat::make('Konsultasi Pending', \App\Models\Consultation::where('status', 'pending')->count())
                ->description('Menunggu diproses')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Konsultasi Selesai', \App\Models\Consultation::where('status', 'processed')->count())
                ->description('Sudah ditangani')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Total Layanan', \App\Models\Service::count())
                ->description('Layanan yang tersedia')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),
        ];
    }
}
