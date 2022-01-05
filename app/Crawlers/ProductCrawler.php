<?php

namespace App\Crawlers;

use App\Enums\EcommerceWeb;

class ProductCrawler
{
    public static function craw(EcommerceWeb $ecommerceWebType)
    {
        switch ($ecommerceWebType) {
            case EcommerceWeb::TIKI:
            case EcommerceWeb::SHOPEE:
            case EcommerceWeb::LAZADA:
                break;
        }
    }
}
