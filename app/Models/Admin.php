<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function user()
    {
        return $this->hasOne(user::class);
    }
}
