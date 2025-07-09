<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'department_id',
        'title',
        'amount'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
