<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantBalance extends Model
{
    protected $guarded = [];

    protected $table = 'tenant_balances';
}
