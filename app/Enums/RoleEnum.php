<?php

namespace App\Enums;

class RoleEnum
{
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const TEACHER = 3;

    public static function getAttribute($attribute): array | null
    {
        $values = [
            'SUPER_ADMIN' => self::SUPER_ADMIN,
            'ADMIN' => self::ADMIN,
            'TEACHER' => self::TEACHER,
        ];

        return $values[$attribute] ?? null;
    }

    public static function values(): array
    {
        return [
            self::SUPER_ADMIN => 1,
            self::ADMIN => 2,
            self::TEACHER => 3,
        ];
    }
}
