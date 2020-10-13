<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenerallSetting extends Model
{
    protected $table = 'generallsetting';
    protected $guarded = ['id'];


    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }
}
