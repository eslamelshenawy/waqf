<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantRent extends Model
{
    protected $guarded = [];

    protected $table = 'tenant_rents';

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }
    public function estateOrders()
    {
        return $this->belongsTo(EstateOrder::class, 'tenant_id', 'tenant_id');
    }

}
