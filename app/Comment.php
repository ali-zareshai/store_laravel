<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['product_id','user_name','user_email','title','text','score'];

    protected $table='commnets';
}
