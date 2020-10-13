<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $guarded = [];
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
}
