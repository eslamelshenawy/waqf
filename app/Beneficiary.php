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

class Beneficiary extends Authenticatable
{
    use Notifiable, SoftDeletes, Common, SessionToken;

    protected $table = 'beneficiaries';
    protected $guard = 'beneficiary';

    protected $dates = [
        'deleted_at',
        'birth_of_date_at',
        'release_at',
        'end_at'
    ];

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'is_active',
        'avatar',
        'status',
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
        'birth_of_date_at',
        'release_at',
        'end_at',
        'company_name',
        'marital_status',
        'bank_account_number',
        'bank_iban_number',
        'bank_id',
        'is_has_kids',
        'check_agree',
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
        'is_verified' => 'boolean',
        'birth_of_date_at' => 'dd-mm-yyyy',
        'release_at' => 'dd-mm-yyyy',
        'end_at' => 'dd-mm-yyyy'
    ];

    public function kids()
    {
        return $this->morphMany('App\Kid', 'kidable');
    }

    public function trashes()
    {
        return $this->morphMany(Trash::class, 'transhable');
    }

    public function getAvatarUrlAttribute()
    {
        return 'avatar.png';
    }

    public function getAvatarFullUrlAttribute()
    {
        return '';
    }

    public function getLastLoggedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->toDateTimeString();
    }

    public function buildings()
    {
        return $this->hasMany('App\Building');
    }

    public function apartments()
    {
        return $this->hasMany('App\Apartment');
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }

    public function lands()
    {
        return $this->hasMany('App\Land');
    }

    public function balances()
    {
        return $this->hasOne(BeneficiaryBalance::class,'beneficiary_id', 'id');
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
