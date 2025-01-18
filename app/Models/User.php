<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        ];
    }

    public function teacher()
    {
       return $this->belongsTo(Teacher::class);
    }
    public function student()
    {
       return $this->belongsTo(student::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function schedules()
    {
        return $this->hasMany(schedules::class);
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
        return $this->hasMany(caMark::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
