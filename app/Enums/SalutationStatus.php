<?php

namespace App\Enums;

use App\Enums\Traits\HasValues;

enum SalutationStatus: string
{
    use HasValues;

    case MR = 'mr';
    case MRS = 'mrs';
    case MISS = 'miss';
    case DR = 'dr';
    case PROF = 'prof';
    case CHIEF = 'chief';
    case ENGR = 'engr';
}