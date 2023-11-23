<?php

namespace App\enums;

use Illuminate\Support\Facades\Log;

enum Gender: string
{
    case MALE = "male";
    case FEMALE = "female";
    case OTHER = "other";

}
