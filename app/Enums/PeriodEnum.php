<?php

namespace App\Enums;

class PeriodEnum
{
    const MORNING = 1;
    const AFTERNOON = 2;
    const NIGHT = 3;

    public static function getAttribute($attribute): array | null
    {
        $values = [
            'MORNING' => self::MORNING,
            'AFTERNOON' => self::AFTERNOON,
            'NIGHT' => self::NIGHT,
        ];

        return $values[$attribute] ?? null;
    }

    public static function values(): array
    {
        return [
            self::MORNING => 1,
            self::AFTERNOON => 2,
            self::NIGHT => 3,
        ];
    }
}
