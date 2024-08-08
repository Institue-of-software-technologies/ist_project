<?php

namespace App\Models;

use App\Models\Project;
use App\Models\JobApplication;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use HasRoles;
    use SoftDeletes;

    // public function hasRole($role)
    // {
    //     return $this->roles->contains('id', $role);
    // }
    
    // protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'activation_token',
        'deactivated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function alumniProfile()
    {
    return $this->hasOne(AlumniProfile::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
    // app/Models/User.php

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo ? asset('storage/' . $this->profile_photo) : asset('default-profile-photo.png');
    }

}
