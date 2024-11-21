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

    public static function toSelectArray(): array
    {
        return [
            self::Active->value => __("enums.status.active"),
            self::Passive->value => __("enums.status.passive"),
            self::Draft->value => __("enums.status.draft"),
            self::Pending->value => __("enums.status.pending"),
        ];
    }
}
