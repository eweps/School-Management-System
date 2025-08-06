<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'matricule',
        'user_id',
        'course_session_id',
        'diploma_id',
        'department_id',
        'level_id',
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

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function courseSession()
    {
        return $this->belongsTo(CourseSession::class);
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function studentDocuments()
    {
        return $this->hasMany(StudentDocument::class);
    }

    public function fees()
    {
        return $this->department->fees();
    }

    public function feeRecords()
    {
        return $this->hasMany(FeeRecord::class);
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

    public function availableCourses() {
        return $this->department->courses()->where('level_id', $this->level_id);
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_student')->withTimestamps();
    }

    public function result_summary(int $semester){
        $courses = $this->courses;

        if(!$courses){
            return NULL;
        }

        $total_credit_value = 0;
        $total_point_earned = 0;

        foreach($courses as $course){
            $total_credit_value = $total_credit_value + $course->credit_value;

            $total_mark = $course->student_total_mark($this->id);

            if($total_mark < 1 ){
                continue;
            }

            $grade_point = $course->get_grade_point($total_mark);

            $quality_point = $course->credit_value * $grade_point;

            $total_point_earned = $total_point_earned + $quality_point;
        }

        if($total_credit_value >= 1 && $total_point_earned >= 1){
            $gpa = (float)$total_point_earned / (float)$total_credit_value;   
            $gpa = round( $gpa , 2);
        }else{
            $gpa = "Not yet available";
        }

        return ["total_credit_value"=>$total_credit_value,"gpa"=>$gpa];
    }
}
