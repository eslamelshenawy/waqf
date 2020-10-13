<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Administrator extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $guard = 'admin';

    protected $table = 'administrators';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }



}
