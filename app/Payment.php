<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $table='payments';

    protected $fillable=[
        'user_id',
        'bill_id',
        'amount',
        'ip',
        'ref_id',
        'status',
        'tracking_code',
        'payment_at',
        'message'
    ];
    
}