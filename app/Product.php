<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\ProductTag;

class Product extends Model
{
    protected $fillable=['cat_id','label','name','price','image','description','count','view','view_count','rate','products_label','child_image_1','child_image_2','child_image_3','child_image_4','option',
    'measuring_range',
    'process_temperature',
    'process_pressure',
    'version',
    'materials_wetted_part',
    'threaded_connection',
    'flange_connection',
    'housing_material',
    'protectionrating',
    'output',
    'ambient_temperature'];


    protected $casts=[
        'settings'=>'array',
        'options'=>'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceRealAttribute()
    {
        return number_format(intval($this->price));
    }


    public function attributes(){
        return $this->belongsToMany(Attribute::class,'attribute_product','product_id','attribute_id');
    }




}
