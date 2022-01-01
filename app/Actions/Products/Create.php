<?php

namespace App\Actions\Products;

use App\Contracts\ValueObjectContract;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

final class Create
{
    public static function handle(ValueObjectContract $object): Model
    {
        return Product::query()->create(
            $object->toArray()
        );
    }
}
