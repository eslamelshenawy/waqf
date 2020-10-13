<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Mail;

class MaintenanceOrder extends Model
{
    protected $guarded = [];


    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }
    public function tenanter()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
    public function madeBy()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
    public function estateOrders()
    {
        return $this->hasMany(EstateOrder::class, 'tenant_id', 'tenant_id');
    }
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'id');
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->id = (string) Str::uuid();
        });
    }

    public function sendAccept(){
        $data = ['maintenanceorder'=>$this];

        Mail::send(['html' => 'email.Statusorder'], $data, function ($message) {
            $message
                ->to($this['tenanter']['email'],$this['tenanter']['name'])
                ->subject('WAQF  Accept Maintenance');
            $message
                ->from('e.elshenawy@iddma.com','WAQF');
        });

    }

}
