<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgenciesBalance extends Model
{

    protected $guarded = [];
    protected $table = 'agencies_balances';

    public function agencies()
    {
        return $this->belongsTo(Agency::class);
    }
}
