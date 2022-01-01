<?php

namespace App\Actions\Orders;

use App\Contracts\ValueObjectContract;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

final class Update
{
    public static function handle(
        QueryBuilder $order,
        ValueObjectContract $object
    ): bool
    {
        return $order->update($object->toArray());
    }
}
