<?php

namespace App\Enums;

enum IncomeTypeEnum: string
{
    case Business = 'business';
    case Personal = 'personal';
    case Other = 'other';

    public static function toArray(): array
    {
        return [
            self::Business->value => 'İş',
            self::Personal->value => 'Kişisel',
            self::Other->value => 'Diğer',
        ];
    }

    public static function getValues(): array
    {
        return [
            self::Business->value,
            self::Personal->value,
            self::Other->value,
        ];
    }
}