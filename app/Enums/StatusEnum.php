<?php

namespace App\Enums;

enum StatusEnum: string
{
    case Active = "active";
    case Passive = "passive";
    case Draft = "draft";
    case Pending = "pending";

    public static function getValues(): array
    {
        return [
            self::Active->value,
            self::Passive->value,
            self::Draft->value,
            self::Pending->value,
        ];
    }

    public static function getLabel($status): string
    {
        return match ($status) {
            self::Active->value => "Aktif",
            self::Passive->value => "Pasif",
            self::Draft->value => "Taslak",
            self::Pending->value => "Beklemede",
            default => "-",
        };
    }

    public static function toSelectArray(): array
    {
        return [
            self::Active->value => "Aktif",
            self::Passive->value => "Pasif",
            self::Draft->value => "Taslak",
            self::Pending->value => "Beklemede",
        ];
    }
}
