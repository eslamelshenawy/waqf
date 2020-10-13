<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $dates = [
        'birth_of_date_at'
    ];

    protected $casts = [
        'birth_of_date_at' => 'dd-mm-yyyy'
    ];

    public function kidable()
    {
        return $this->morphTo();
    }



}
