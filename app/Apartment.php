<?php

namespace App;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Estate
{

    protected $table = 'estates';

    protected $hidden = [
        'name', 'is_has_warehouse', 'warehouse_space'
    ];

    public function building()
    {
        return $this->belongsTo('App\Estate', 'parent_id', 'id');
    }

    public static function all($columns = ['*'])
    {
        return parent::all($columns)
            ->where('estate_type', 'apartment');
    }
}
