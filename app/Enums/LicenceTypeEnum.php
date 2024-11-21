<?php

namespace App\Enums;

enum LicenceTypeEnum: string
{
    case PreSearch = "pre_search";
    case DetailSearch = "detail_search";
    case Operation = "operation";

    public static function toArray(): array
    {
        return [
            self::PreSearch->value => "Ön Arama Dönemi",
            self::DetailSearch->value => "Detay Arama Dönemi",
            self::Operation->value => "İşletme Ruhsatı",
        ];
    }

    public static function getValues(): array
    {
        return [
            self::PreSearch->value,
            self::DetailSearch->value,
            self::Operation->value,
        ];
    }
}
