<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=['name','label'];
    protected $table='subcategorys';

}
