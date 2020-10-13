<?php


namespace App\Repositories\User\Tenant;

use App\Beneficiary;
use App\Notifications\AdminNotification;
use App\Tenant;
use App\Trash;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Notification;

class TenantRepository implements TenantRepositoryInterface
{

    public function all()
    {
        return Tenant::withoutTrashed()->get();
    }

    public function getCount(): int
    {
        return $this->all()->count();
    }

    public function getById($id): object
    {
        return Tenant::find($id);
    }

    public function getByEmail($email): object
    {
        return Tenant::whereEmail($email)->first();
    }


    public function create(array $data): object
    {
        $uniqueId = (string) Str::uuid(11);
        $tenant = null;
        DB::transaction(function() use ($data, $uniqueId, &$tenant){
            $tenant = Tenant::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'city_id' => isset($data['city_id']) ? $data['city_id'] : getModelId('City', 'name_en', $data['city']),
                'identity_number' => $data['identity_number'],
                'password' => bcrypt($data['password']),
                'is_active' => isset($data['is_active']) ?? false,
                'type' => 'tenant',
                'unique_id' => $uniqueId,
                'birth_of_date_at' => $data['birth_of_date_at'],
                'release_at' => $data['release_at'],
                'end_at' => $data['end_at'],
                'job' => $data['job'],
                'job_title_other' => isset($data['job_title_other']) ? $data['job_title_other'] : null,
                'is_has_kids' => isset($data['is_has_kids']) ?? false,
            ]);

        });

        return $tenant;
    }


    public function update(int $id, array $data)
    {
        if(isset($data['city'])){
            $data['city_id'] = getModelId('City', 'name_en', $data['city']);
        }
        $tenant = $this->getById($id);
        $tenant->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'city_id' => isset($data['city_id']) ? $data['city_id'] : getModelId('City', 'name_en', $data['city']),
            'identity_number' => $data['identity_number'],
            'password' => bcrypt($data['password']),
            'is_active' => isset($data['is_active']) ?? false,
            'type' => 'tenant',
            'birth_of_date_at' => $data['birth_of_date_at'],
            'release_at' => $data['release_at'],
            'end_at' => $data['end_at'],
            'job' => $data['job'],
            'check_agree' => 1   ,
            'status' => $data['account_status'],
            'job_title_other' => isset($data['job_title_other']) ? $data['job_title_other'] : null,
            'is_has_kids' => isset($data['is_has_kids']) ?? false,
        ]);
//
//        $tenant->update($data);
        return $tenant;
    }

    public function getByIdWithTrashed(int $id): object
    {
        return Tenant::withTrashed()->find($id);
    }

    public function trashing(int $id): bool
    {
        $tenant = $this->getById($id);
        if($tenant->delete()){
            Trash::create([
                'trashable_type' => 'App\Tenant',
                'trashable_id' => $tenant->unique_id,
            ]);
            return true;
        }
        return false;
    }

    public function trashes()
    {
        return Tenant::withTrashed()->get();
    }

    public function delete(int $id): bool
    {
        $beneficiary = $this->getById($id);

        if( ! $beneficiary){
            $beneficiary = $this->getByIdWithTrashed($id);
        }

        if($beneficiary->kids()->count()){
            $beneficiary->kids()->delete();
        }
        if($beneficiary->forceDelete()){
            return true;
        }
        return false;
    }
}
