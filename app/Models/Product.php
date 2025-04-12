<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'description',
        'price',
        'inventory_level',
        'active',
    ];

    // Tipos de dados dos atributos
    protected $casts = [
        'price'             => 'decimal:2',
        'inventory_level'   => 'integer',
        'active'             => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
