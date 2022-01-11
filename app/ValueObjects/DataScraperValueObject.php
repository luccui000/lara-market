<?php

namespace App\ValueObjects;

use App\Contracts\ValueObjectContract;

class DataScraperValueObject implements ValueObjectContract
{
    public function __construct(
        public string $name,
        public string $sku,
        public string $shortDescription,
        public string $price,
        public string $rating,
        public string $thumbImage,
        public string $stockQty
    ) {

    }
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'sku' => $this->sku,
            'short_description' => $this->shortDescription,
            'price' => $this->price,
            'rating' => $this->rating,
            'thumb_image' => $this->thumbImage,
            'stock_qty' => $this->stockQty,
        ];
    }
}
