<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:loaction', function () {
    $this->info('Website LoAction berbasis Laravel dan Tailwind CSS.');
});
