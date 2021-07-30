<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    protected $fillable=['bill_id', 'product_id','amount', 'discount','price'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
