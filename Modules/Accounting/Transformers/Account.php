<?php

namespace Modules\Accounting\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class Account extends JsonResource
{


    public function toArray($request)
    {
        return parent::toArray($request);
    }


}
