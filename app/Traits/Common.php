<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait Common
{
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function documents()
    {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

}
