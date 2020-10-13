<?php

namespace Modules\Accounting\Entities;

use App\Tenant;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Accounting
{


    protected $appends = ['tenant_name'];

    public function journalByVoucher()
    {
        return $this->hasOneThrough(
            Journal::class,
            Voucher::class,
            'voucherable_id', // Foreign key on products table...
            'journalable_id', // Foreign key on orders table...
            'id', // Local key on suppliers table...
            'id' 
        );
    }

    public function journal()
    {
        return $this->morphOne(Journal::class, 'journalable');
    }


    // public function transaction()
    // {
    //     return $this->morphOne(Transaction::class, 'transactionable');
    // }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function getTenantNameAttribute()
    {
        return $this->tenant->name;
    }

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function voucher()
    {
        return $this->morphOne(Voucher::class, 'voucherable');
    }

}
