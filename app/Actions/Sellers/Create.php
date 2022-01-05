<?php

namespace App\Actions\Sellers;

use App\Models\Seller;
use App\ValueObjects\SellerValueObject;
use Illuminate\Database\Eloquent\Model;

class Create
{
    public static function handle(SellerValueObject $object): Model
    {
        return Seller::query()->create(
            $object->toArray()
        );
    }
}
