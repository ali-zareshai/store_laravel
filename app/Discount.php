<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Discount extends Model
{
    protected $fillable=['product_id','price_discount'];

    protected $table='discounts';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    
    }
}
