<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Accounting
{
    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function journal()
    {
        return $this->morphOne(Journal::class, 'journalable');
    }
}
