<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiry';
    protected $guarded = ['id'];


    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }
}
