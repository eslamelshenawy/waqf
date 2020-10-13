<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contactus';
    protected $guarded = ['id'];

    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }
}
