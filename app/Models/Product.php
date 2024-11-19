<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'discount',
        'rating',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'image' => 'string',
        'discount' => 'float',
        'rating' => 'float',
    ];
}
