<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipped_date',
        'payment_type',
        'status',
        'total_discount',
        'total',
        'note',
        'created_by',
        'customer_id'
    ];
}
