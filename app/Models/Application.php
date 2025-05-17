<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name',
        'email',
        'course_session_id',
        'diploma_id',
        'id_card_number',
        'address',
        'gender',
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

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function courseSession()
    {
        return $this->belongsTo(CourseSession::class);
    }
}