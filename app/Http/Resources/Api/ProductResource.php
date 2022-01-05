<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class ProductResource extends JsonApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'category' => $this->category,
            'seller' => [
                'name' => $this->seller?->name,
                'email' => $this->seller?->email,
                'address' => $this->seller?->address,
            ],
        ];
    }
}
