<?php

namespace App\Enums;

class TicketEnum
{
    const OPEN = 1;
    const ANSWERED = 2;
    const FINISHED = 3;

    public static function getAttribute($attribute): array | null
    {
        $values = [
            'OPEN' => self::OPEN,
            'ANSWERED' => self::ANSWERED,
            'FINISHED' => self::FINISHED,
        ];

        return $values[$attribute] ?? null;
    }

    public static function values(): array
    {
        return [
            self::OPEN => 1,
            self::ANSWERED => 2,
            self::FINISHED => 3,
        ];
    }
}
