<?php

namespace App\Crawlers;

use App\Enums\EcommerceWeb;
use App\Scraper\LazadaScraper;
use App\Scraper\ShopeeScraper;
use App\Scraper\TikiScraper;
use App\ValueObjects\DataScraperValueObject;

class ProductCrawler
{
    public static function craw($url, $ecommerceWebType): DataScraperValueObject
    {
        switch ($ecommerceWebType) {
            case EcommerceWeb::TIKI->value:
                return (new TikiScraper($url))->handle();
                break;
            case EcommerceWeb::SHOPEE->value:
                return (new ShopeeScraper($url))->handle();
                break;
            case EcommerceWeb::LAZADA->value:
                return (new LazadaScraper($url))->handle();
                break;
        }
    }
}
