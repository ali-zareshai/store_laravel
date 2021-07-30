<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public $timestamps = false;
    protected $fillable=['name'];

    protected $table='tags';
}