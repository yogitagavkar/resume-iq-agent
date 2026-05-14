<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_name',
        'file_path',
        'status'
    ];

    public function screeningResult()
    {
        return $this->hasOne(ScreeningResult::class);
    }
}