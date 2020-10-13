<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Fund extends Accounting
{
    protected $guarded = [];

    public function balances()
    {
        return $this->hasMany(FundBalance::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class,'account_id','id');
    }

}
