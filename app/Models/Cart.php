<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer',
    ];
}
