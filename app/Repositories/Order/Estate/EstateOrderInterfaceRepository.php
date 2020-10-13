<?php


namespace App\Repositories\Order\Estate;


interface EstateOrderInterfaceRepository
{
    public function create(array $data);
    public function store_data_end(array $data);
}
