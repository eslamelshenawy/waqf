<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Accounting
{

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'attributable');
    }
}
