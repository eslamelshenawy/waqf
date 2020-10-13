<?php

namespace App;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Estate
{

    protected $table = 'estates';

    public function building()
    {
        return $this->belongsTo('App\Estate', 'parent_id', 'id');
    }

    public function setCommercialActivitiesAttribute($value)
    {
        $this->attributes['commercial_activities'] = json_encode(explode(', ', trim($value)));
    }

    public function getCommercialActivitiesAttribute()
    {
        return implode(', ', json_decode($this->attributes['commercial_activities'], JSON_PRETTY_PRINT));
    }

    public function setAirConditionerBrandAttribute($value)
    {
        $this->attributes['air_conditioner_brand'] = json_encode($value);
    }

    public function getAirConditionerBrandAttribute()
    {
        return implode(', ', json_decode($this->attributes['air_conditioner_brand'], JSON_PRETTY_PRINT));
    }

    public static function all($columns = ['*'])
    {
        return parent::all($columns)
            ->where('estate_type', 'shop');
    }

    public function getCommercialActivities()
    {
        return implode(', ', json_decode($this->attributes['commercial_activities']));
    }

}
