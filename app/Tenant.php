<?php

namespace App;

use App\Scopes\TenantScope;
use App\Traits\Common;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Tenant extends User
{
    public function balances()
    {
        return $this->hasOne(TenantBalance::class, 'tenant_id', 'id');
    }

    public function rents()
    {
        return $this->hasMany(TenantRent::class, 'tenant_id', 'id');
    }

    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class, 'tenant_id', 'id');
    }
    public function estateOrders()
    {
        return $this->hasMany(EstateOrder::class, 'tenant_id', 'id');
    }
    public function kids()
    {
        return $this->morphMany('App\Kid', 'kidable');
    }

}
