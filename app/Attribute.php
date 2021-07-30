<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','label','value'];

    public function Products(){
        return $this->belongsToMany(Product::class,'attribute_product','product_id','attribute_id');
    }
}
