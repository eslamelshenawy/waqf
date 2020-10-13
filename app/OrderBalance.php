<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderBalance extends Model
{
    protected $guarded = ['id'];
    protected $table = 'orderbalance';

    public function madeBy()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id', 'id');
    }

}
