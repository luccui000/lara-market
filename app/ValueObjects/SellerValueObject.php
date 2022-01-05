<?php

namespace App\ValueObjects;

use App\Contracts\ValueObjectContract;

class SellerValueObject implements ValueObjectContract
{
    /**
     * @param string $name
     * @param string $email
     * @param string $phoneNumber
     * @param string $address
     * @param string $avatar
     * @param string|null $description
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $phoneNumber,
        public string $address,
        public string $avatar,
        public null|string $description,
        public string $password,
    ) {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'avatar' => $this->avatar,
            'address' => $this->address,
            'description' => $this->description,
            'password' => $this->password,
        ];
    }
}
