<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    public $timestamps = false;
    protected $fillable=['product_id','tag_id'];
    protected $table='product_tags';

    public function Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}