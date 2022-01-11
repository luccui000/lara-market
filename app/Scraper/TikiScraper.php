<?php

namespace App\Scraper;

use App\Abstracts\ScraperAbstract;
use App\ValueObjects\DataScraperValueObject;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class TikiScraper extends ScraperAbstract
{
    const TIKI_DETAIL_PRODUCT = "https://tiki.vn/api/v2/products/";
    /**
     * @return DataScraperValueObject
     */
    public function handle(): DataScraperValueObject
    {
        $url = parse_url($this->url);
        preg_match('/p\d{1,10}/', $url['path'], $matches);
        $response = Http::get($this->getUrl(substr($matches[0], 1)));
        $products = $response->json();

        $data = $this->getData($products);


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

    /**
     * @param $mixinData
     * @return array
     */
    public function getData(array|Crawler $mixinData): array
    {
        return [
            'name' =>  data_get($mixinData,  'name'),
            'sku' =>  data_get($mixinData,  'sku'),
            'short_description' =>  data_get($mixinData,  'short_description'),
            'price' =>  data_get($mixinData,  'price'),
            'rating' =>  data_get($mixinData,  'rating_average'),
            'thumb_image' =>  data_get($mixinData,  'thumbnail_url'),
            'stock_qty' =>  data_get($mixinData,  'stock_item.qty'),
        ];
    }
    /**
     * @param $productId
     * @return string
     */
    public function getUrl($productId): string
    {
        return self::TIKI_DETAIL_PRODUCT . $productId . "?platform=web";
    }
}
