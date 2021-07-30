<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatSubCategory extends Model
{
    protected $fillable=['cat_id','subcat_id'];
    protected $table='cat_subcat';

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subcat_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

}
