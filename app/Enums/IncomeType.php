<?php

namespace App\Enums;

enum IncomeType: string
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

    public static function toSelectArray(): array
    {
        return [
            self::Other->value => 'Diğer',
            self::Business->value => 'İş',
            self::Personal->value => 'Kişisel',
        ];
    }

    public function getValues(): array
    {
        return [
            self::Business->value,
            self::Personal->value,
            self::Other->value,
        ];
    }
}
