<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumeScreeningController extends Controller
{
    public function analyzeView(Request $request)
    {
        $resume = $request->file('resume');

        $jd = $request->job_description;

        $response = app(
            \App\Services\ResumeAgentService::class
        )->analyze($resume, $jd);

        return view('result', [
            'result' => $response
        ]);
    }
}