<?php

namespace App;

use App\Traits\Common;
use App\Traits\SessionToken;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Mail;
use Modules\Accounting\Entities\Voucher;

class Agency extends Authenticatable
{
    use Notifiable, SoftDeletes, Common, SessionToken;

    protected $table = 'agencies';
    protected $guard = 'agency';

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'avatar',
        'status',
        'type',
        'unique_id',
        'identity_number',
        'city_id',
        'address',
        'services',
        'service_other',
        'is_active',
        'is_available',
        'is_verified',
        'unique_id',
        'is_authenticated'
    ];

    protected $hidden = [
        'password', 'remember_token', 'unique_id', 'session_token', 'unique_id'
    ];

    protected $casts = [
        'name' => 'string',
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'is_available' => 'boolean',
        'is_verified' => 'boolean'
    ];

    public function setServicesAttribute($value)
    {
        $this->attributes['services'] = implode(',', $value);
    }

    public function getServices()
    {
        return explode(',', $this->attributes['services']);
    }

    public function getAvatarUrlAttribute()
    {
        return 'avatar.png';
    }
    public function maintenanceOrders()
    {
        return $this->hasMany(MaintenanceOrder::class, 'agency_id', 'id');
    }

    public function getAvatarFullUrlAttribute()
    {
        return '';
    }

    public function getLastLoggedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->toDateTimeString();
    }

    public function orders()
    {
        return $this->hasMany(MaintenanceOrder::class, 'agency_id', 'id');
    }
    public function vouchers($moveId)
    {
        return Voucher::where('number',$moveId)->get();
    }
    public function balances()
    {
        return $this->hasOne(AgenciesBalance::class, 'agencies_id', 'id');
    }

    public function sendActivationMail(){
        $data = ['user'=>$this];
        Mail::send(['html' => 'email.welcomeEmail'], $data, function ($message) {
            $message
                ->to('e.elshenawy@iddma.com','dsadasdasdas')
                ->subject('WAQF  activation mail');
            $message
                ->from('e.elshenawy@iddma.com','WAQF');
        });

    }


}
