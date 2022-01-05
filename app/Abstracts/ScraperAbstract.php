<?php

namespace App\Abstracts;

abstract class ScraperAbstract
{
    protected string $url;
    abstract function handle();
}
