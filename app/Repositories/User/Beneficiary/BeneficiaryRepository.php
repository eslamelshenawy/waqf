<?php


namespace App\Repositories\User\Beneficiary;

use App\Beneficiary;
use App\Kid;
use App\Notifications\AdminNotification;
use App\Trash;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Notification;

class BeneficiaryRepository implements BeneficiaryRepositoryInterface
{

    public function all()
    {
        return Beneficiary::withoutTrashed()->get();
    }

    public function getCount(): int
    {
        return $this->all()->count();
    }

    public function getById($id): object
    {
        return Beneficiary::find($id);
    }

    public function create(array $data): object
    {
        // dd($data);
        $uniqueId = (string) Str::uuid(11);
        $beneficiary = null;
        DB::transaction(function() use ($data, $uniqueId, &$beneficiary){
            $beneficiary = Beneficiary::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'identity_number' => $data['identity_number'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password']),
                'is_active' => isset($data['is_active']) ?? false,
                'unique_id' => $uniqueId,
                'city_id' => isset($data['city']) ? getModelId('City', 'name_en', $data['city']) : $data['city_id'],
                'birth_of_date_at' => $data['birth_of_date_at'],
                'release_at' => $data['release_at'],
                'end_at' => $data['end_at'],
                'job' => $data['job'],
                'check_agree' => isset($data['is_active']) == 1  ? true : false ,
                'job_title_other' => isset($data['job_title_other']) ? $data['job_title_other'] : null,
                'company_name' => $data['company_name'],
                'bank_id' => $data['bank_id'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_iban_number' => $data['bank_iban_number'],
                'marital_status' => $data['marital_status'],
                'is_has_kids' => isset($data['is_has_kids']) ? $data['is_has_kids'] : false,
            ]);

            if( is_array($data['kid_id']) && count($data['kid_id']) > 0 ){
                for($i=0; $i<count($data['kid_id']); $i++){
                    if($data['kid_name'][$i] == null || trim($data['kid_name'][$i]) == ''){
                        continue;
                    }else{
                        $kid = Kid::create([
                            'kidable_id' => $beneficiary->id,
                            'kidable_type' => 'App\Beneficiary',
                            'name' => $data['kid_name'][$i],
                            'identity_number' => $data['kid_identity_number'][$i],
                            'birth_of_date_at' => $data['kid_birth_of_date_at'][$i],
                            'gender' => $data['kid_gender'][$i]
                        ]);
                        $beneficiary->kids()->save(
                            $kid
                        );
                    }
                }
            }
        });
        $user = Beneficiary::find($beneficiary->id);
        $orderBalance['message']="تم تسجيل مستفيد جديد ";
        Notification::send($user, new AdminNotification($orderBalance));

        return $beneficiary;
    }

    public function update(int $id, array $data): object
    {
        $beneficiary = $this->getById($id);
        if(isset($data['city'])){
            $data['city_id'] = getModelId('City', 'name_en', $data['city']);
            unset($data['city']);
        }

        DB::transaction(function() use ($data, &$beneficiary){
            $beneficiary->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'identity_number' => $data['identity_number'],
                'mobile' => $data['mobile'],
                // 'password' => bcrypt($data['password']),
                'is_active' => isset($data['is_active']) ?? false,
                'city_id' => isset($data['city']) ? getModelId('City', 'name_en', $data['city']) : $data['city_id'],
                'birth_of_date_at' => $data['birth_of_date_at'],
                'release_at' => $data['release_at'],
                'end_at' => $data['end_at'],
                'job' => $data['job'],
                'status' => $data['account_status'],
                'job_title_other' => isset($data['job_title_other']) ? $data['job_title_other'] : null,
                'company_name' => $data['company_name'],
                'bank_id' => $data['bank_id'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_iban_number' => $data['bank_iban_number'],
                'marital_status' => $data['marital_status'],
                'is_has_kids' => isset($data['is_has_kids']) ? $data['is_has_kids'] : false,
            ]);
            
            // dd($data,$beneficiary);
            $beneficiary->kids()->delete();
            if($beneficiary->is_has_kids == true){
               if(isset($data['kid_id'])){
                    if( is_array($data['kid_id']) && count($data['kid_id']) > 0 ){
                    for($i=0; $i<count($data['kid_id']); $i++){
                        if($data['kid_name'][$i] == null || trim($data['kid_name'][$i]) == ''){
                            continue;
                        }else{
                            // $beneficiary->kids()->delete();
                            $kid = Kid::create([
                                'kidable_id' => $beneficiary->id,
                                'kidable_type' => 'App\Beneficiary',
                                'name' => $data['kid_name'][$i],
                                'identity_number' => $data['kid_identity_number'][$i],
                                'birth_of_date_at' => $data['kid_birth_of_date_at'][$i],
                                'gender' => $data['kid_gender'][$i]
                            ]);
                            $beneficiary->kids()->save(
                                $kid
                            );
                        }
                    }
                }
               }   
            }


        });

        return $beneficiary;
    }

    public function trashing(int $id): bool
    {
        $beneficiary = $this->getById($id);
        if($beneficiary->delete()){
            Trash::create([
                'trashable_type' => 'App\Beneficiary',
                'trashable_id' => $beneficiary->unique_id,
            ]);
            return true;
        }
        return false;
    }

    public function trashes()
    {
        return Beneficiary::withTrashed()->get();
    }

    public function getByIdWithTrashed(int $id): object
    {
        return Beneficiary::withTrashed()->find($id);
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
