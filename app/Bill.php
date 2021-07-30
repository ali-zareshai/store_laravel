<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable=[
        'user_id',
        'free_transport',
        'payment_method',
        'total_price'
    ];
}
