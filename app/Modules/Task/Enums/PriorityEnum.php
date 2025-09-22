<?php

namespace App\Modules\Task\Enums;

enum PriorityEnum: string
{
    case LOW = "low";
    case MEDIUM = "medium";
    case HIGH = "high";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
