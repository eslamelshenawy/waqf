<?php


namespace App\Repositories\User\Agency;

use App\Agency;
use App\Beneficiary;
use App\Image;
use App\MaintenanceOrder;
use App\Notifications\AdminNotification;
use App\User;
use App\Notifications\BeneficiariesNotification;
use App\Notifications\TenantNotification;
use App\Traits\Uploader;
use App\Trash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;
use Notification;

class AgencyRepository implements AgencyRepositoryInterface
{
    use Uploader;

    public function all()
    {
        return Agency::withoutTrashed()->get();
    }

    public function update_status(array $data)
    {
        $update_status = MaintenanceOrder::where('order_number',$data['order_number'])->with('estateOrders','tenanter','agency')->first();
        $update_status->is_accepted = $data['val_stat'];
        $update_status->save();
        $user=\Auth::user();
        if($data['val_stat'] == 1){
            $user = User::find($update_status->tenant_id);
            $message = $update_status->agency->name."تمت الموافقه على الطلب المقدم لوكيل الصيانة  ";
            $update_status['message']=$message;
            Notification::send($user, new TenantNotification($update_status));
        }

        if($data['val_stat'] == 2){
            $user = User::find($update_status->tenant_id);
            $message = $update_status->agency->name."لم تتم  الموافقه على الطلب المقدم لوكيل الصيانة  ";
            $update_status['message']=$message;
            Notification::send($user, new TenantNotification($update_status));
        }
        $update_status->sendAccept();

        return true;
    }

    public function getById(int $id): object
    {
        return Agency::find($id);
    }

    public function getByEmail(string $email): object
    {
        return Agency::whereEmail($email)->first();
    }

    public function create(array $data): object
    {
        
        $uniqueId = (string) Str::uuid();
        $agency = null;
        DB::transaction(function() use ($data, $uniqueId, &$agency){
//            $agencyImageName = $this->uploadingImage($data['instrument_image']);
            $agency = Agency::create([
                'name' => $data['name'],
                'identity_number' => $data['identity_number'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password']),
                'is_active' => isset($data['is_active']) ?? false,
                'unique_id' => $uniqueId,
                'city_id' => isset($data['city_id']) ? $data['city_id'] : getModelId('City', 'name_en', $data['city']),
                'type' => $data['type'],
                'address' => $data['address'],
                'services' => $data['services'],
                'service_other' => isset($data['service_other']) ? $data['service_other'] : null
            ]);
           
//            $instrumentImage = Image::create([
//                'imageable_type' => 'App\Agency',
//                'imageable_id' => $agency->id,
//                'name' => $agencyImageName,
//                'more' => 'instrument-image'
//            ]);
        });
        // dd($agency);
        $user = Agency::find($agency->id);
        $orderBalance['message']="تم تسجيل وكيل جديد ";
        Notification::send($user, new AdminNotification($orderBalance));

        return $agency;
    }

    public function update(array $data, int $id): object
    {
        if(isset($data['city'])){
            $data['city_id'] = getModelId('City', 'name_en', $data['city']);
        }
        $agency = $this->getById($id);
        
        // $agency->update($data);
        
        $agency->update([
                'name' => $data['name'],
                'identity_number' => $data['identity_number'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                // 'password' => bcrypt($data['password']),
                'is_active' => isset($data['is_active']) ?? false,
                // 'unique_id' => $uniqueId,
                'city_id' => isset($data['city_id']) ? $data['city_id'] : getModelId('City', 'name_en', $data['city']),
                'type' => $data['type'],
                'address' => $data['address'],
                'services' => $data['services'],
                'service_other' => isset($data['service_other']) ? $data['service_other'] : null
            ]);
   

        return $agency;
    }

    public function filterByService(string $service)
    {
        if($service == null){
            return null;
        }
        $agencies = $this->all();
        if($agencies->count() == 0){
            return null;
        }
        $filterAgencies = collect();
        if($agencies->count()){
            foreach($this->all() as $index => $agency){
                $agencyServices = decode_set($agency->services);
                if(in_array($service, $agencyServices)){
                    $filterAgencies->push($agency);
                }else{
                    if($agency->service_other == $service){
                        $filterAgencies->push($agency);
                    }
                }
            }
        }
        return $filterAgencies;
    }

    public function search($service, $q)
    {
        $agencies = Agency::where('name', 'LIKE', '%' . $q . '%');
    }

    public function advancedSearch($service, $q, $perPage)
    {
        $agencies = DB::table('agencies')->where('name', 'like', '%' . $q . '%');
        if($service == 'all' && $agencies->count() > 0){
            return $agencies->get($perPage);
        }
        $filteredAgencies = collect();
        if($agencies->count() > 0 || $service != null){
            foreach($agencies->get() as $index => $agency){
                if(in_array($service, decode_set($agency->services))){
                    $filteredAgencies->push($agency);
                }
            }
        }
        return $filteredAgencies;
    }

    public function getOrders($id)
    {
        return $this->getById($id)->orders;
    }

    public function pagination($perPage)
    {
        return Agency::query()->paginate($perPage);
    }

    public function getByIdWithTrashed(int $id): object
    {
        return Agency::withoutTrashed()->find($id);
    }

    public function trashing(int $id): bool
    {
        $agency = $this->getById($id);
        if($agency->delete()){
            Trash::create([
                'trashable_type' => 'App\Agency',
                'trashable_id' => $agency->unique_id,
            ]);
            return true;
        }
        return false;
    }

    public function trashes()
    {
        return Agency::withTrashed()->get();
    }

    public function delete($id): bool
    {
        $agency = $this->getById($id);
        if( ! $agency){
            $agency = $this->getByIdWithTrashed($id);
        }
        if($agency->forceDelete()){
            return true;
        }
        return false;
    }
}
