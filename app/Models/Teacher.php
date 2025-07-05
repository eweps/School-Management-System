<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = [
        'matricule',
        'user_id',
        'id_card_number',
        'address',
        'marital_status',
        'phone_number',
        'date_of_birth',
        'place_of_birth',
        'salutation',
        'preferred_language',
        'academic_diplomas',
        'professional_diplomas',
        'professional_experience',
        'other_relevant_info',
    ];

    public function user()
    {
          return $this->belongsTo(User::class);
    }

    public function resources()
    {
        return $this->hasMany(LearningResource::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_course')->withTimestamps();
    }
}
