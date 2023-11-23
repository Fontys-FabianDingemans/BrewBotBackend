<?php

namespace App\enums;

enum Beer: string
{
    case ZERO = "zero";
    case NORMAL = "normal";
    case SPECIAL = "special";

    public static function random(): Beer
    {
        return match (rand(0, 2)) {
            0 => self::ZERO,
            1 => self::NORMAL,
            2 => self::SPECIAL,
        };
    }

}
