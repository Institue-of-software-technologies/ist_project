<?php

namespace App\Models;

use Database\Seeders\skills;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'problem_statement',
        'solution_proposed',
        'description',
        'flowchart_diagram',
        'database_diagram',
        'powerpoint',
        'demo_url',
        'video_url',
        'github_repository',
        'visibility',
        // 'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'project_tools', 'project_id', 'tool_id');
    }

    public function skills()
    {
        return $this->belongsToMany(skills::class);
    }

}
