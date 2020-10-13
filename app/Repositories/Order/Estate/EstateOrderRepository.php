<?php

namespace App\Repositories\Order\Estate;

use App\EstateOrder;
use App\MaintenanceOrder;
use Illuminate\Support\Str;
use DateTime;
class EstateOrderRepository implements EstateOrderInterfaceRepository
{
    public function create(array $data)
    {
        // $fdate = $data['booking_at'];
        // $tdate = $data['ended_at'];
        // $datetime1 = new DateTime($fdate);
        // $datetime2 = new DateTime($tdate);
        // $interval = $datetime1->diff($datetime2);
        // $days = $interval->format('%a');//now do whatever you like with $days
        $countEstateOrder= EstateOrder::count();
            EstateOrder::create([
                'tenant_id' => $data['tenant_id'],
                'estate_id' => $data['estateable_id'],
                'order_number' => ++$countEstateOrder,
                'rented_at' => "2020-08-01",
                'ended_at' => "2020-08-01",
                'description' => $data['description'],
                'amount' => $data['price'],
                // 'rent_period' => $days,
            ]);
            return true;


    }

        public function store_data_end(array $data)
    {
        $update_status = MaintenanceOrder::where('order_number',$data['order_num'])->first();
        if(strtotime($data['Date_end']) > strtotime('now') &&  strtotime($data['Date_end']) > strtotime($update_status->available_at)){
            $update_status->ended_at = $data['Date_end'];
            $update_status->save();
            return true;
        }else{
            return false;
        }
    }




}
