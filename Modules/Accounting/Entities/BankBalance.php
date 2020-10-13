<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class BankBalance extends Model
{
    protected $guarded = [];

    protected $table = 'bank_balances';

    public function bank()
    {
        return $this->belongsTo('Modules\Accounting\Entities\Bank', 'bank_id', 'id');
    }

}
