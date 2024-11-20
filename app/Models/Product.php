<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'image',
        'discount',
        'rating',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'category' => 'string',
        'price' => 'float',
        'image' => 'string',
        'discount' => 'float',
        'rating' => 'float',
    ];
}
