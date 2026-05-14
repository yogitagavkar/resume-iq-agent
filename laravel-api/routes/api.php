<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResumeScreeningController;

Route::post(
    '/resume/screen',
    [ResumeScreeningController::class, 'store']
);