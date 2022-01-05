<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'avatar',
        'address',
        'description',
        'email_verified_at',
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
