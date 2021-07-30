<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [
        'create_at'
    ];
    public function scopeOfCount($query, $count)
    {
        if (empty($count))
            return $query;
        return $query->take($count);
    }
}
