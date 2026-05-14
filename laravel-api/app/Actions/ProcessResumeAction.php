<?php

namespace App\Actions;

use App\Actions\UploadResumeAction;
use App\Jobs\AnalyzeResumeJob;

class ProcessResumeAction
{
    public function execute($request)
    {
        $resume = app(UploadResumeAction::class)
            ->execute($request->file('resume'));

        AnalyzeResumeJob::dispatch(
            $resume->id,
            $request->job_description
        );

        return response()->json([
            'message' => 'Resume uploaded successfully',
            'resume_id' => $resume->id
        ]);
    }
}