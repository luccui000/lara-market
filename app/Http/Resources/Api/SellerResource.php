<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class SellerResource extends JsonApiResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'avatar' => $this->avatar,
            'description' => $this->description,
        ];
    }
}
