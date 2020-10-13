<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $guarded = ['id'];



    public function account()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function childes()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
