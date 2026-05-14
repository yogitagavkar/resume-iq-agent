<?php

namespace App\Jobs;

use App\Services\ResumeAgentService;

class AnalyzeResumeJob
{
    public function __construct(
        public string $resumePath,
        public string $jobDescription
    ) {}

    public function handle(
        ResumeAgentService $service
    ) {
        $service->analyze(
            $this->resumePath,
            $this->jobDescription
        );
    }
}