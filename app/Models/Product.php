<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'category_id',
        'seller_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function sizes()
    {
        return $this->hasManyThrough(Size::class, ProductEntry::class);
    }
    public function colors()
    {
        return $this->hasManyThrough(Color::class, ProductEntry::class);
    }
}
