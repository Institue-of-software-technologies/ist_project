<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company_id',
        'location',
        'salary',
        'user_id',
        'company_name', 
        'job_type', 
        'experience_level', 
        'education_level', 
        'skills'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
