<?php

namespace App\Models;

use App\Models\Tool;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectTools extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_id',
        'tool_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tools()
    {
        return $this->belongsTo(Tool::class);
    }

}
