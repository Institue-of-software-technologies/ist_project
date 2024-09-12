<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
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
        'user_id'
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function skills()
        {
            return $this->belongsToMany(Skill::class, 'user_skills', 'user_id', 'skill_id');
        }

        public function syncSkills(array $skillNames)
        {
            $skillIds = collect($skillNames)->map(function ($skillName) {
                return Skill::firstOrCreate(['name' => $skillName])->id;
            })->toArray();
    
            $this->skills()->sync($skillIds);
        }
}
