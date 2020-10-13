<?php

namespace App\Repositories\Estate\Apartment;

use App\Apartment;
use App\Estate;
use App\Image;
use App\Traits\Uploader;
use Illuminate\Support\Facades\DB;

class ApartmentRepository implements ApartmentRepositoryInterface
{

    use Uploader;

    public function all()
    {
        return Apartment::all();
    }

    public function getById(int $id)
    {
        return Apartment::find($id);
    }

    public function create(array $data)
    {
        $apartment = null;
        DB::transaction(function() use ($data, &$apartment){
            if(isset($data['building'])){
                $parentId = getModelId('Estate', 'number', $data['building']);
                if($parentId == 0){
                    $parentId = $data['building'];
                    $data['parent_id'] = $parentId;
                    unset($data['building']);
                }
            }elseif(isset($data['building_id'])){
                $parentId = $data['building_id'];
                $data['parent_id'] = $parentId;
                unset($data['building']);
            }
            if(isset($data['city'])){
                $cityId = getModelId('City', 'name_en', $data['city']);
                if($cityId == 0){
                    $cityId = $data['city'];
                    $data['city_id'] = $cityId;
                    unset($data['city']);
                }
            }elseif(isset($data['city_id'])){
                $cityId = $data['city_id'];
                $data['city_id'] = $cityId;
                unset($data['city']);
            }
            $apartment = Apartment::create([
                'number' => $data['number'],
                'floor_number' => $data['floor_number'],
                'parent_id' => $parentId,
                'city_id' => $cityId,
                'number_of_rooms' => $data['number_of_rooms'],
                'space' => $data['space'],
                'number_of_toilets' => $data['number_of_toilets'],
                'number_of_kitchens' => $data['number_of_kitchens'],
                'is_has_air_conditioner' => isset($data['is_has_air_conditioner']),
                'number_of_air_conditioner' => $data['number_of_air_conditioner'],
                'is_kitchen_ready' => isset($data['is_kitchen_ready']),
                'kitchen_details' => $data['kitchen_details'],
                'is_has_parking' => isset($data['is_has_parking']),
                'parking_number' => $data['parking_number'],
                'rent_type' => $data['rent_type'],
                'estate_type' => 'apartment',
                'price' => $data['price'],
                'is_active' => isset($data['is_active']) ?? false,
                'extra_details' => isset($data['extra_details']) ? $data['extra_details'] : null
            ]);
            $this->path = 'apartments';
            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $apartment->id,
                        'imageable_type' => 'App\Apartment',
                    ]);
                    $apartment->images()->save(
                        $image
                    );
                }
            }
        });
        return $apartment;
    }

    public function update(int $id, array $data)
    {
        
        $apartment = $this->getById($id);
        DB::transaction(function() use ($data, &$apartment){
            if(isset($data['building'])){
                $data['parent_id'] = getModelId('Estate', 'number', $data['building']);
                if($data['parent_id'] == 0){
                    $data['parent_id'] = $data['building'];
                }
                unset($data['building']);
            }
            if(isset($data['city'])){
                $data['city_id'] = getModelId('City', 'name_en', $data['city']);
                unset($data['city']);
            }
            if(isset($data['images'])){
                  if($apartment->images()->get()->isNotEmpty()){
                foreach ($apartment->images()->get() as $apartmentimage){
                    $apartmentimage->delete();
                }
            }  
            
            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $apartment->id,
                        'imageable_type' => 'App\Apartment',
                    ]);
                    $apartment->images()->save(
                        $image
                    );
                }
            }
            }
        
// dd($data);
            

//            $apartment->update($data);
//        dd($data);
            $apartment->update([
                'number' => $data['number'],
                'floor_number' => $data['floor_number'],
//                'city_id' => $cityId,
                'number_of_rooms' => $data['number_of_rooms'],
                'space' => $data['space'],
                'number_of_toilets' => $data['number_of_toilets'],
                'number_of_kitchens' => $data['number_of_kitchens'],
                'is_has_air_conditioner' => isset($data['is_has_air_conditioner']),
                'number_of_air_conditioner' => $data['number_of_air_conditioner'],
                'is_kitchen_ready' => isset($data['is_kitchen_ready']),
                'kitchen_details' => $data['kitchen_details'],
                'is_has_parking' => isset($data['is_has_parking']),
                'parking_number' => $data['parking_number'],
                'rent_type' => $data['rent_type'],
                'estate_type' => 'apartment',
                'price' => $data['price'],
                'is_active' => isset($data['is_active']) ?? false,
                'extra_details' => isset($data['extra_details']) ? $data['extra_details'] : null
            ]);

        });
        return $apartment;
    }

    public function getByIdWithTrashed(int $id)
    {

    }

    public function trashing(int $id)
    {
        $apartment = $this->getById($id);
        $apartment->delete();
        return true;
    }

    public function trashes()
    {
        return Apartment::withTrashed()->get();
    }

    public function delete($id)
    {
        $apartment = $this->getById($id);
        if($apartment->images){
            foreach($apartment->imaegs as $image){
                $this->removeImage($image->name);
            }
            $apartment->forceDelete();
        }
        $apartment->forceDelete();
    }
}
