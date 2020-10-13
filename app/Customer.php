<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Customer extends Accounting
{
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'attributable');
    }
}
