<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobView extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id'];
    public function views()
    {
        return $this->hasMany(JobView::class);
    }

    public function uniqueViews()
    {
        return $this->views()->distinct('ip_address')->count();
    }
    public function totalViews()
    {
        return $this->views()->count();
    }
    public function applicationCount()
    {
        return $this->applications()->count();
    }
    public function applicationRate()
    {
        return $this->totalViews() ? ($this->applicationCount() / $this->totalViews()) * 100 : 0;
    }
}
