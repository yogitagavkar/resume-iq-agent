<?php

namespace App\Services;

class ResumeStorageService
{
    public function store($file)
    {
        return $file->store('resumes');
    }
}