<?php

namespace App\Factories;

use App\ValueObjects\ProductValueObject;

final class ProductFactory
{
    /**
     * @param array $attributes
     * @return ProductValueObject
     */
    public static function make(array $attributes): ProductValueObject
    {
        return new ProductValueObject(
            name: strval(data_get($attributes, 'name')),
            description: strval(data_get($attributes, 'description')),
            thumbnail: strval(data_get($attributes, 'thumbnail')),
            categoryId: strval(data_get($attributes, 'category_id')),
        );
    }
}
