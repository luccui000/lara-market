<?php

namespace App\Abstracts;

use App\ValueObjects\DataScraperValueObject;
use Symfony\Component\DomCrawler\Crawler;

abstract class ScraperAbstract
{
    protected string $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    abstract function handle(): DataScraperValueObject;
    abstract function getData(array|Crawler $mixinData): array;
}
