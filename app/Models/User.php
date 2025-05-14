<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'is_active',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            'is_active' => 'boolean'
        ];
    }


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function liveClasses()
    {
        return $this->hasMany(LiveClass::class);
    }

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }

    public function caMarks()
    {
        return $this->hasMany(CaMark::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
