<?php

namespace App\Actions\Users;

use App\Contracts\ValueObjectContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Create
{
    public static function handle(ValueObjectContract $object): Model
    {
        return User::query()->create($object->toArray());
    }
}
