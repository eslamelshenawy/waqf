<?php

namespace Modules\Subscribe\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['email'];
}
