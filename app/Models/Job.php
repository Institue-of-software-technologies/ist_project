<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use SoftDeletes;
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
        'skills',
        'deleted_at',
        'company_logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
