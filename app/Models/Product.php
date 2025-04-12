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
        'trash',
    ];

    // Tipos de dados dos atributos
    protected $casts = [
        'price'             => 'decimal:2',
        'inventory_level'   => 'integer',
        'trash'             => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('trash', 0);
    }
}
