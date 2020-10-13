<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VocherOutUsers extends Model
{
    protected $table = 'vocheroutusers';
    protected $guarded = ['id'];


    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }
}
