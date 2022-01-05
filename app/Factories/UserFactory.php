<?php

namespace App\Factories;

use App\ValueObjects\UserValueObject;
use Illuminate\Support\Facades\Hash;

class UserFactory
{
    /**
     * @param array $attributes
     * @return UserValueObject
     */
    public static function make(array $attributes): UserValueObject
    {
        return new UserValueObject(
            name: data_get($attributes, 'name'),
            email: data_get($attributes, 'email'),
            password: Hash::make(data_get($attributes, 'password')),
        );
    }
}
