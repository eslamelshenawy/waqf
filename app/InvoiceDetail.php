<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{

    protected $table = 'invoice_details';

    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
