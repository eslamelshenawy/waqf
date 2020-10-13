<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Bank extends Accounting
{
    protected $table = 'accounting_banks';

    public function balances()
    {
        return $this->hasMany(BankBalance::class);
    }
}
