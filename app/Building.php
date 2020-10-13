<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Building extends Estate
{

    protected $table = 'estates';

    protected $hidden = [
        'is_has_warehouse',
        'warehouse_space',
        'is_has_decoration',
        'is_kitchen_ready',
        'is_has_air_conditioner',
        'is_has_parking',
        'is_has_license' ,
        'air_conditioner_brand',
        'is_on_street_front',
        'parking_number',
        'floor_number',
        'is_has_decoration',
        'decoration_details',
        'is_kitchen_ready',
        'commercial_activities'
    ];

    public function attributes()
    {
        return $this->attributesToArray();
    }

    public function apartments()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function shops()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public static function all($columns = ['*'])
    {
        return parent::all($columns)
            ->where('estate_type', 'building');
    }



}
