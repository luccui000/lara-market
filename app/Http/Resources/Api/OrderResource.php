<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class OrderResource extends JsonApiResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toAttributes(Request $request): array
    {
        return [
            'shipped_date' => $this->shipped_date,
            'payment_type' => $this->payment_type,
            'payment_transaction' => $this->payment_transaction,
            'payment_ref' => $this->payment_ref,
            'payment_code' => $this->payment_code,
            'status' => $this->status,
            'total_discount' => $this->total_discount,
            'total' => $this->total,
            'note' => $this->note,
            'created_by' => $this->created_by,
            'customer_id' => $this->customer_id,
        ];
    }
}
