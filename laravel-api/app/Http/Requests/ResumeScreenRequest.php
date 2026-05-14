<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeScreenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'resume' => ['required', 'file'],
            'job_description' => ['required', 'string']
        ];
    }
}