<?php

namespace App\Actions;

use App\Models\Resume;
use App\Services\ResumeStorageService;

class UploadResumeAction
{
    public function execute($file)
    {
        $path = app(ResumeStorageService::class)
            ->store($file);

        return Resume::create([
            'candidate_name' => pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ),
            'file_path' => $path,
            'status' => 'uploaded'
        ]);
    }
}