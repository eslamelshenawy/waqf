<?php

namespace App;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Estate extends Model
{
    use SoftDeletes, Common;

    protected $guarded = ['id'];
    protected $appends = ['address'];
    protected $table = 'estates';

    public function setUsageTypeAttribute($value)
    {
        $this->attributes['usage_type'] = implode(',', $value);
    }

    public function getUsageTypeAttribute()
    {
        return explode(',', $this->attributes['usage_type']);
    }

    public function getAddressAttribute()
    {
        return $this->city->name_ar . ' ' .
            $this->attributes['district'] . ' ' . $this->attributes['street'];
    }

    public function getExtraDetailsAttribute()
    {
        return Str::limit($this->attributes['extra_details'], 255);
    }

    public function estaterent()
    {
        return $this->belongsTo(TenantRent::class, 'id', 'estate_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->{'slug'} = Str::slug('estate' . ' ' .
                $model->{'estate_type'} . ' ' . $model->{'number'});
            $model->{'unique_id'} = (string) Str::uuid();
        });
    }
}
