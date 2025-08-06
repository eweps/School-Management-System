<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name',
        'code',
        'description',
        'credit_value',
        'semester_id',
        'level_id'
    ];

    public function learningResources()
    {
        return $this->hasMany(LearningResource::class);
    }

    public function examMarks()
    {
        return $this->hasMany(ExamMark::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function caMarks()
    {
        return $this->hasMany(CaMark::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'course_department')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_course')->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withTimestamps();
    }

    public function student_ca_mark($student_id){
        $mark = DB::table('ca_marks')->where('student_id',$student_id)->where('course_id', $this->id)->first();
        if($mark){
            return $mark->mark;
        }else{
            return NULL;
        }
    }


     public function student_exam_mark($student_id){
        $mark = DB::table('exam_marks')->where('student_id',$student_id)->where('course_id', $this->id)->first();
        if($mark){
            return $mark->mark;
        }else{
            return NULL;
        }
    }

    public function student_total_mark($student_id){
        $ca_mark = $this->student_ca_mark($student_id);
        $exam_mark = $this->student_exam_mark($student_id);
        if($ca_mark && $exam_mark){
            return $ca_mark + $exam_mark;
        }else{
            return NULL;
        }
    }

    public function get_grade_point($mark){
        if($mark >= 80){
            return 4.0;
        }elseif($mark >= 70){
            return 3.5;
        }elseif($mark >= 60){
            return 3.0;
        }elseif($mark >= 55){
            return 2.5;
        }elseif($mark >= 50){
            return 2.0;
        }elseif($mark >= 45){
            return 1.5;
        }elseif($mark >= 40){
            return 1.0;
        }else{
            return 0;
        }
    }

    public function student_grade($student_id){
        $total_course_mark = $this->student_total_mark($student_id);
        if(!$total_course_mark){
            return NULL;
        }

        $grade_point = $this->get_grade_point($total_course_mark);
        
        switch ($grade_point) {
            case 4.0:
                return "A";
                break;
            case 3.5:
                return "B+";
                break;
            case 3.0:
                return "B";
                break;
            case 2.5:
                return "C+";
                break;
            case 2.0:
                return "C";
                break;
            case 1.5:
                return "D+";
                break;
            case 1.0:
                return "D";
                break;
            default:
                return "F";
                break;
        }
    }
}
