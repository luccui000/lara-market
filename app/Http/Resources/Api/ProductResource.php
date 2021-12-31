<?php

namespace App\Http\Resources\Api;

use TiMacDonald\JsonApi\JsonApiResource;

class ProductResource extends JsonApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toAttributes($request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'category_id' => $this->category_id,
        ];
    }
}
