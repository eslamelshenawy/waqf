<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Accounting
{

    public function voucherable()
    {
        return $this->morphTo();
    }

    public function journal()
    {
        return $this->morphOne(Journal::class, 'journalable');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

        public function account()
    {
        return $this->belongsTo(Account::class ,'account_id','id');
    }

        public function fund()
    {
        return $this->belongsTo(Fund::class ,'paymentable_id','id');
    }
        public function bank()
    {
        return $this->belongsTo(Bank::class ,'paymentable_id','id');
    }

    // public function transaction()
    // {
    //     return $this->morphOne(Transaction::class, 'transactionable');
    // }

}
