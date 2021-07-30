<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['text','image','url','name'];

    protected $table='banner';
}