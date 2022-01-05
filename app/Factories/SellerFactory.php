<?php

namespace App\Factories;

use App\ValueObjects\SellerValueObject;
use Illuminate\Support\Facades\Hash;

class SellerFactory
{
    public static function make(array $attributes): SellerValueObject
    {
        return new SellerValueObject(
            name: strval(data_get($attributes, 'name')),
            email: strval(data_get($attributes, 'email')),
            phoneNumber: strval(data_get($attributes, 'phone_number')),
            address: strval(data_get($attributes, 'address')),
            avatar: strval(data_get($attributes, 'avatar')),
            description: strval(data_get($attributes, 'description')),
            password: Hash::make(
                strval(data_get($attributes, 'password'))
            ),
        );
    }
}
