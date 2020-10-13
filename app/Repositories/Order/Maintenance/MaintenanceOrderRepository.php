<?php


namespace App\Repositories\Order\Maintenance;

use App\Agency;
use App\EstateOrder;
use App\Image;
use App\MaintenanceOrder;
use App\Notifications\AgencyNotification;
use App\Notifications\TenantNotification;
use App\Traits\Uploader;
use http\Client\Curl\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Notification;
class MaintenanceOrderRepository implements MaintenanceOrderInterfaceRepository
{
    use Uploader;

    public function create(array $data)
    {

//        $EstateOrder= EstateOrder::where()->;
        $cityId = getModelId('City', 'name_en', $data['city']);
        $MaintenanceOrder=null;
        DB::transaction(function() use ($data, $cityId, &$MaintenanceOrder){
            $this->path = 'buildings';
            $MaintenanceOrder=  MaintenanceOrder::create([
            'tenant_id' => $data['tenant_id'],
            'agency_id' => $data['agency_id'],
            'estate_id' => $data['apartment_id'],
            'apartmentId' => $data['apartmentId'],
            'description' => $data['description'],
            'available_at' => $data['date'],
            'city_id' => $cityId,
            'order_number' => Str::random(8),
        ]);
            for($i=0; $i<count($data['images']); $i++){
                $MaintenanceOrderImageName =$this->uploadingImage($data['images'][$i]);
                $instrumentImage = Image::create([
                    'imageable_type' => 'App\MaintenanceOrder',
                    'imageable_id' => $MaintenanceOrder->id,
                    'name' => $MaintenanceOrderImageName,
                    'more' => 'MaintenanceOrder-image'
                ]);
            }

        });
        $user = Agency::find($data['agency_id']);
        $MaintenanceOrder['message']="هناك طلب صيانه جديد ";
        Notification::send($user, new AgencyNotification($MaintenanceOrder));

        return true;
    }

    public function getOrders(int $id){
        return  MaintenanceOrder::where('tenant_id',$id)->get();
    }
}
