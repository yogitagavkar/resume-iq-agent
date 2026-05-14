<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resume;

class ResumeSeeder extends Seeder
{
    public function run(): void
    {
        Resume::create([
            'candidate_name' => 'Demo Candidate',
            'file_path' => 'resumes/demo.pdf',
            'status' => 'completed'
        ]);
    }
}