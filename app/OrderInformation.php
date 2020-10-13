<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInformation extends Model
{
    protected $guarded = ['id'];
    protected $table = 'orderinformation';

    public function madeBy()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id', 'id');
    }
}
