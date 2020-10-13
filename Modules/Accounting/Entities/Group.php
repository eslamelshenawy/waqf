<?php

namespace Modules\Accounting\Entities;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Group extends Accounting
{
    protected $dates = [
        'start_financial_date_at',
        'end_financial_date_at'
    ];


}
