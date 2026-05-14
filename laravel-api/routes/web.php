<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResumeScreeningController;

Route::get('/', function () {
    return view('welcome');
});

Route::post(
    '/analyze',
    [ResumeScreeningController::class, 'analyzeView']
);