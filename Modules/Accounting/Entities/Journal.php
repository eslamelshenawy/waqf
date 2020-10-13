<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Journal extends Accounting
{


    public function journalable()
    {
        return $this->morphTo();
    }

    public function details()
    {
        return $this->hasMany(JournalDetail::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'journalable_id', 'id');
    }


    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($model){
    //         $model->journalable_id = (string) \Str::uuid();
    //     });
    // }

}
