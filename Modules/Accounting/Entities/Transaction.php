<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Accounting
{

    public function transactionable()
    {
        return $this->morphTo('transactionable');
    }

    public function attributable()
    {
        return $this->morphTo('attributable');
    }
}
