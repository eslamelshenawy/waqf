<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryBalance extends Model
{

    protected $guarded = [];
    protected $table = 'beneficiary_balances';

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
