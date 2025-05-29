<?php

namespace App\Enums;

use App\Enums\Traits\HasValues;

enum GenderStatus: string
{
    use HasValues;
    
    case MALE = 'male';
    case FEMALE = 'female';
}
