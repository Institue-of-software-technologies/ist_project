<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectSkills extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_id',
        'skill_id'
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
