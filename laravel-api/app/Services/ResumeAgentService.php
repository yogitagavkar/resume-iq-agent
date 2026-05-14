<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ResumeAgentService
{
    public function analyze($resume, $jd)
    {
        $response = Http::attach(
            'resume',
            fopen($resume->getRealPath(), 'r'),
            $resume->getClientOriginalName()
        )->post(
            env('FASTAPI_URL').'/analyze',
            [
                'job_description' => $jd
            ]
        );

        return $response->json();
    }
}