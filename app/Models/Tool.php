<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = ['tool_name'];
    
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}

