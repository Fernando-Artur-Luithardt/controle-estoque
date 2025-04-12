<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'description',
        'price',
        'inventory_level',
        'barcode',
        'active',
    ];

    protected $casts = [
        'price'             => 'decimal:2',
        'inventory_level'   => 'integer',
        'active'            => 'integer',
        'barcode'           => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
