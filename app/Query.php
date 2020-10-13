<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Query extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->{'id'} = (string) Str::uuid();
            $model->{'code'} = Str::random(8);
        });
    }
}
