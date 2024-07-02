<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    'title', 'problem_statement', 'solution_proposed', 'description', 'flowchart_diagram',
    'database_diagram', 'powerpoint', 'demo_url', 'video_url', 'tools_used',
    'programming_language', 'github_repository', 'visibility',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
