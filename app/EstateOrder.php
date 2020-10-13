<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstateOrder extends Model
{
    protected $table = 'estate_orders';
    protected $guarded = ['id'];

    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }


    public function madeBy()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }

    public function tenanter()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

}
