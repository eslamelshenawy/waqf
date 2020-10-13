<?php

namespace App;

use App\Scopes\TenantScope;
use App\Traits\Common;
use App\Traits\SessionToken;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use function Sodium\randombytes_buf;
use Mail;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Common, SessionToken;

    protected $table = 'users';
//    protected $guard = 'tenant';

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
        'birth_of_date_at',
        'release_at',
        'end_at',
        'job',
        'job_title_other',
        'marital_status',
        'is_has_kids',
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
        'release_at' => 'dd-mm-yyyy',
        'birth_of_date_at' => 'dd-mm-yyyy',
        'end_at' => 'dd-mm-yyyy',
    ];


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
