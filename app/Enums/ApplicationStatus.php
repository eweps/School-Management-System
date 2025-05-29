<?php

namespace App\Enums;

use App\Enums\Traits\HasValues;

enum ApplicationStatus: string
{
    use HasValues;
    
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}