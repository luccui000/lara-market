<?php

namespace App\Factories;

use App\ValueObjects\OrderValueObject;

class OrderFactory
{
    /**
     * @param array $attributes
     * @return OrderValueObject
     */
    public static function make(array $attributes): OrderValueObject
    {
        return new OrderValueObject(
            shippedDate: $attributes['shipped_date'],
            paymentType: $attributes['payment_type'],
            status: $attributes['status'],
            totalDiscount: $attributes['total_discount'],
            total: $attributes['total'],
            note: $attributes['note'],
            customer: $attributes['customer_id'],
            createdBy: $attributes['created_by']
        );
    }
}
