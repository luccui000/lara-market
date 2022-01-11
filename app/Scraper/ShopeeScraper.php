<?php

namespace App\Scraper;

use App\Abstracts\ScraperAbstract;
use App\ValueObjects\DataScraperValueObject;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

final class ShopeeScraper extends ScraperAbstract
{
    const SHOPEE_DETAIL_PRODUCT = "https://shopee.vn/api/v4/item/get";

    public function handle(): DataScraperValueObject
    {
        $response = Http::get($this->getUrl());
        $products = $response->json();

        $data = $this->getData($products['data']);

        return new DataScraperValueObject(
            name: $data['name'],
            sku: $data['sku'],
            shortDescription: $data['short_description'],
            price: $data['price'],
            rating: $data['rating'],
            thumbImage: $data['thumb_image'],
            stockQty: $data['stock_qty'],
        );
    }
    public function getData(array|Crawler $mixinData): array
    {
        return [
            'name' =>  data_get($mixinData,  'name'),
            'sku' =>  '',
            'short_description' =>  data_get($mixinData,  'description'),
            'price' =>  data_get($mixinData,  'price'),
            'rating' =>  data_get($mixinData,  'item_rating.rating_star'),
            'thumb_image' =>  "",
            'stock_qty' =>  data_get($mixinData,  'stock'),
        ];
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        $removedQueryString = explode('?', $this->url);
        $originUrl = explode('.', $removedQueryString[0]);
        if(!isset($originUrl[2]) || !isset($originUrl[3]))
            return "";
        $shopId = $originUrl[2];
        $itemId = $originUrl[3];
        return self::SHOPEE_DETAIL_PRODUCT . "?itemid=" . $itemId . "&shopid=" . $shopId;
    }
}
