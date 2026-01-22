<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'product_name',
        'category_id',
        'slug',
        'image',
        'product_code',
        'brand',
        'purchase_price',
        'selling_price',
        'discount',
        'stock',
        'description',
        'status',
    ];


    public function cartegories()
    {
        return $this->belongsTo(Cartegory::class, 'category_id');
    }

}
