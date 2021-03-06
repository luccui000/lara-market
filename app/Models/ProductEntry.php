<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'price',
        'image',
        'qty',
        'product_id',
        'color_id',
        'size_id',
    ];
}
