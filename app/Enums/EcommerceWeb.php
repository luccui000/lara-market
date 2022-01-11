<?php

namespace App\Enums;

enum EcommerceWeb: string
{
    case LAZADA = "www.lazada.vn";
    case TIKI = "tiki.vn";
    case SHOPEE = "shopee.vn";

    public static function toArray(): array
    {
        return [
            EcommerceWeb::LAZADA->value,
            EcommerceWeb::TIKI->value,
            EcommerceWeb::SHOPEE->value,
        ];
    }
}
