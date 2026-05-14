<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScreeningResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'match_score',
        'skills_found',
        'matched_skills',
        'missing_skills',
        'recommendation'
    ];

    protected $casts = [
        'skills_found' => 'array',
        'matched_skills' => 'array',
        'missing_skills' => 'array'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}