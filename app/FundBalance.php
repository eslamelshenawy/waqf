<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class FundBalance extends Model
{
    protected $guarded = [];

    protected $table = 'fund_balances';

    public function fund()
    {
        return $this->belongsTo(Fund::class, 'fund_id', 'id');
    }
}
