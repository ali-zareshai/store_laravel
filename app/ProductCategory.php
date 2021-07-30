<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $timestamps = false;
    protected $fillable=['product_id','category_id','is_category'];

    protected $table='product_categories';

    public function Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}