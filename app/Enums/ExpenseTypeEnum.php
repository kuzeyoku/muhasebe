<?php

namespace App\Enums;

enum ExpenseTypeEnum: string
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

    public static function getLabel($type): string
    {
        return match ($type) {
            self::Business->value => 'İş',
            self::Personal->value => 'Kişisel',
            self::Other->value => 'Diğer',
            default => '-',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::Business => 'İş',
            self::Personal => 'Kişisel',
            self::Other => 'Diğer',
        };
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
