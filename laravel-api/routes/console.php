<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('resumes:cleanup', function () {
    $this->info('Cleaning old resumes...');
})->purpose('Cleanup old resumes');

Schedule::command('resumes:cleanup')
    ->daily();