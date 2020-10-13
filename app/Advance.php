<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $table = 'advance';
    protected $guarded = ['id'];

    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }

    public function madeBy()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id', 'id');
    }
}
