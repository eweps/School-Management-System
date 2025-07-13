<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeRecord extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'reference',
        'student_id',
        'fee_id',
        'receipt',
        'amount_paid',
        'total_amount',
        'amount_left',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
