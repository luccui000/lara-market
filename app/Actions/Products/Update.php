<?php

namespace App\Actions\Products;

use App\Contracts\ValueObjectContract;
use Spatie\QueryBuilder\QueryBuilder;

class Update
{
    public static function handle(
        QueryBuilder $product,
        ValueObjectContract $object
    ): bool {
        return $product->update($object->toArray());
    }
}
