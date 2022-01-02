<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipped_date',
        'payment_type',
        'payment_transaction',
        'payment_ref',
        'payment_code',
        'status',
        'total_discount',
        'total',
        'note',
        'created_by',
        'customer_id'
    ];
    public const ORDER_STATUS = [
        OrderStatus::WAIT_FOR_CONFIRMATION,
        OrderStatus::CONFIRMED,
        OrderStatus::SHIPPING,
        OrderStatus::FINISHED,
    ];
    public const ORDER_PAYMENT_TYPE = [
        PaymentType::DELIVERY,
        PaymentType::ONLINE
    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
