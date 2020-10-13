<?php


namespace App\Repositories\Order\Maintenance;


interface MaintenanceOrderInterfaceRepository
{
    public function create(array $data);
    public function getOrders(int $id);

}
