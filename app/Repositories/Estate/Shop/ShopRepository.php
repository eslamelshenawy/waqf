<?php

namespace App\Repositories\Estate\Shop;

use App\Estate;
use App\Image;
use App\Shop;
use App\Traits\Uploader;
use Illuminate\Support\Facades\DB;

class ShopRepository implements ShopRepositoryInterface
{

    use Uploader;

    public function all()
    {
        return Shop::all();
    }

    public function getById(int $id)
    {
        return Shop::find($id);
    }

    public function create(array $data)
    {
        // dd($data);
        $shop = null;
        DB::transaction(function() use ($data, &$shop){
            $parentId = 0;
            $cityId = 0;
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
            $shop = Shop::create([
                'number' => $data['number'],
                'parent_id' => $parentId,
                'city_id' => $cityId,
                'space' => $data['space'],
                'price' => $data['price'],
                'is_on_street_front' => $data['is_on_street_front'],
                'is_has_decoration' => $data['is_has_decoration'],
                'decoration_details' => isset($data['decoration_details']) ? $data['decoration_details'] : null,
                'is_has_air_conditioner' => $data['is_has_air_conditioner'],
                'number_of_air_conditioner' => $data['number_of_air_conditioner'],
                'air_conditioner_brand' => isset($data['air_conditioner_brand']) ? $data['air_conditioner_brand'] : null,
                'is_has_license' => ($data['is_has_license']),
                'license_notes' => isset($data['license_notes']) ? $data['license_notes'] : null,
                'is_has_warehouse' => $data['is_has_warehouse'],
                'warehouse_space' => isset($data['warehouse_space']) ? $data['warehouse_space'] : null,
                'rent_type' => $data['rent_type'],
                'estate_type' => 'shop',
                'extra_details' => isset($data['extra_details']) ? $data['extra_details'] : null,
                'commercial_activities' => isset($data['commercial_activities']) ?: null,
                'is_active' => isset($data['is_active']) ?? false
            ]);
            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $shop->id,
                        'imageable_type' => 'App\Shop',
                    ]);
                    $shop->images()->save(
                        $image
                    );
                }
            }
        });
        return $shop;
    }

    public function update(int $id, array $data)
    {
        
        $shop = $this->getById($id);
        DB::transaction(function() use ($data, &$shop){
            $parentId = 0;
            $cityId = 0;
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

            if(isset($data['images'])){
            if($shop->images()->get()->isNotEmpty()){
                foreach ($shop->images()->get() as $shopimage){
                    $shopimage->delete();
                }
            }

            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $shop->id,
                        'imageable_type' => 'App\Shop',
                    ]);
                    $shop->images()->save(
                        $image
                    );
                }
            }
            }
                
            $shop->update([
                'number' => $data['number'],
                'parent_id' => $parentId,
                'city_id' => $cityId,
                'space' => $data['space'],
                'price' => $data['price'],
                'is_on_street_front' => $data['is_on_street_front'],
                'is_has_decoration' => $data['is_has_decoration'],
                'decoration_details' => isset($data['decoration_details']) ? $data['decoration_details'] : null,
                'is_has_air_conditioner' => ($data['is_has_air_conditioner']),
                'number_of_air_conditioner' => $data['number_of_air_conditioner'],
                'air_conditioner_brand' => isset($data['air_conditioner_brand']) ? $data['air_conditioner_brand'] : null,
                'is_has_license' => ($data['is_has_license']),
                'license_notes' => isset($data['license_notes']) ? $data['license_notes'] : null,
                'is_has_warehouse' => $data['is_has_warehouse'],
                'warehouse_space' => isset($data['warehouse_space']) ? $data['warehouse_space'] : null,
                'rent_type' => $data['rent_type'],
                'estate_type' => 'shop',
                'extra_details' => isset($data['extra_details']) ? $data['extra_details'] : null,
                'commercial_activities' => isset($data['commercial_activities']) ?: null,
                'is_active' => isset($data['is_active']) ?? false
            ]);
            
            // dd($shop,$data);

//            $shop->update($data);
        });
        return $shop;
    }

    public function trashing(int $id)
    {
        $shop = $this->getById($id);
        if($shop->images()->count()){
            $shop->images()->delete();
        }
        $shop->delete();
    }

    public function trashes()
    {
        return Estate::where(['estate_type' => 'shop'])
            ->withTrashed()->get();
    }

    public function delete(int $id)
    {
        $shop = $this->getById($id);
        if($shop->images()->count()){
            foreach($shop->images as $key => $image){
                $this->removeImage($image->name);
            }
            $shop->images()->forceDelete();
        }
        $shop->forceDelete();
    }
}
