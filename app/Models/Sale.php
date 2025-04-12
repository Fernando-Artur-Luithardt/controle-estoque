<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'product_id',
        'amount',
        'price'
    ];

    /**
     * Relacionamento com Produtos
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * Retorna soma valor da venda como atributo na model
     * @return string
     */
    public function getTotalAttribute()
    {
        $sum = $this->amount * $this->price;
        return number_format($sum, 2, ',', '.');
    }
}
