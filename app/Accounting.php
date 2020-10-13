<?php


namespace Modules\Accounting\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Accounting extends Model
{
    protected $guarded = [];
//    protected $keyType = 'string';
//    public $incrementing = false;
//    protected $primaryKey = 'id';

//    public static function boot()
//    {
//        parent::creating(function($model){
//            $model->id = (string) Str::uuid();
//        });
//    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

}
