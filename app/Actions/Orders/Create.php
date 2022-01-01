<?php

namespace App\Actions\Orders;

use App\Contracts\ValueObjectContract;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

final class Create
{
    public static function handle(ValueObjectContract $object): Model
    {
        return Order::query()->create(
            attributes: $object->toArray()
        );
    }
}
