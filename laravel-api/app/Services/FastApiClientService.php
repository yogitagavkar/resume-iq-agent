<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FastApiClientService
{
    public function analyze(array $data)
    {
        return Http::post(
            env('FASTAPI_URL').'/analyze',
            $data
        )->json();
    }
}