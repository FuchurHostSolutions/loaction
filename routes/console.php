<?php

use App\Models\ActivityLog;
use App\Models\SiteVisit;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('about:loaction', function () {
    $this->info('Website LoAction berbasis Laravel dan Tailwind CSS.');
});

// Jadwal pembersihan otomatis database (auto-pruning)
Schedule::call(function () {
    SiteVisit::where('created_at', '<', now()->subDays(90))->delete();
})->weekly()->name('prune-site-visits');

Schedule::call(function () {
    ActivityLog::where('created_at', '<', now()->subDays(180))->delete();
})->monthly()->name('prune-activity-logs');

