<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlumniProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', 
        'email', 
        'degree', 
        'graduation_year', 
        'extra_course', 
        'profile_photo', 
        'current_job_title',
        'current_employer', 
        'location', 
        'phone', 
        'linkedin_profile', 
        'social_media_links', 
        'skills', 
        'user_id'
        ];

        public function user()
        {
        return $this->belongsTo(User::class);
        }
}
