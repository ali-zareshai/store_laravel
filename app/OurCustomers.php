<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurCustomers extends Model
{
    protected $fillable=['name','image','url'];

    protected $table='our_customers';
}