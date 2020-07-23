<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'address',
        'delivery_date',
        'delivery_time',
        'cart'
    ];

    protected $casts = [
        'full_name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'delivery_date' => 'date',
        'delivery_time' => 'datetime:H:i',
        'cart' => 'array'
    ];
}
