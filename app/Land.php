<?php

namespace App;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Land extends Estate
{
    protected $table = 'estates';

    protected $guarded = ['id'];


    public static function all($columns = ['*'])
    {
        return parent::all($columns)
            ->where('estate_type', 'land');
    }


}
