<?php

namespace App\Scraper;

use App\Abstracts\ScraperAbstract;
use App\ValueObjects\DataScraperValueObject;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class LazadaScraper extends ScraperAbstract
{
    function handle(): DataScraperValueObject
    {
        $response = Http::get($this->url);
        $crawler = new Crawler((string)$response->body());

        $data = $this->getData($crawler);

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
            'name' =>  $mixinData->filter('.pdp-product-title')->text(),
            'sku' =>  '',
            'short_description' =>  '',
            'price' =>   $mixinData->filter('.pdp-price')->text(),
            'rating' =>  '',
            'thumb_image' =>  $mixinData->filter('.pdp-mod-common-image')->image()->getNode()->getAttribute('src'),
            'stock_qty' =>  1,
        ];
    }
}
