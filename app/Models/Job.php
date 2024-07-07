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

    public function views()
    {
        return $this->hasMany(JobView::class);
    }

    /**
     * Get the applications for the job.
     */
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    /**
     * Calculate total views for the job.
     */
    public function totalViews()
    {
        return $this->views->count();
    }

    /**
     * Calculate unique views for the job.
     */
    public function uniqueViews()
    {
        return $this->views->unique('user_id')->count();
    }

    /**
     * Calculate number of applications for the job.
     */
    public function applicationCount()
    {
        return $this->applications->count();
    }

    /**
     * Calculate application rate (%) for the job.
     */
    public function applicationRate()
    {
        $totalViews = $this->totalViews();
        if ($totalViews > 0) {
            return ($this->applicationCount() / $totalViews) * 100;
        } else {
            return 0;
        }
    }
}
