<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    public $timestamps = false;
    protected $fillable=['user_id','role_id'];

    protected $table='user_roles';
}