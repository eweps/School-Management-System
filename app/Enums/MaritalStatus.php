<?php

namespace App\Enums;

use App\Enums\Traits\HasValues;

enum MaritalStatus: string
{
    use HasValues;
    
    case SINGLE = 'single';
    case MARRIED = 'married';
    case SEPARATED = 'separated';
    case DIVORCED = 'divorced';
}
