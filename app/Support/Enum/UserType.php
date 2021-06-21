<?php

namespace App\Support\Enum;

use JetBrains\PhpStorm\ArrayShape;

class UserType
{
    CONST ADMIN = 'admin';
    CONST STUDENT = 'student';
    CONST WRITER = 'writer';
    const GUEST = 'guest';
    CONST STUDENT_LABEL = 'Student User';
    CONST WRITER_LABEL = 'Writer User';

    #[ArrayShape([self::STUDENT => "string", self::WRITER => "string"])]
    public static function registrable(): array
    {
        return [
            self::STUDENT => self::STUDENT_LABEL,
            self::WRITER => self::WRITER_LABEL,
        ];
    }

    public static function roles(): array
    {
        return [
            self::ADMIN,
            self::STUDENT,
            self::WRITER,
        ];
    }

    public static function role(string $type): string
    {
        return match ($type){
            self::ADMIN => self::ADMIN,
            self::STUDENT => self::STUDENT,
            self::WRITER => self::WRITER,
            default => self::GUEST
        };
    }
}
