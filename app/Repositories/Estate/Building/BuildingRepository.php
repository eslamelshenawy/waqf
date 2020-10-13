<?php

namespace App\Repositories\Estate\Building;

use App\Building;
use App\Estate;
use App\Image;
use App\Traits\Uploader;
use App\Trash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BuildingRepository implements BuildingRepositoryInterface
{
    use Uploader;

    public function all()
    {
        return Estate::where('estate_type', 'building')->withoutTrashed()->get();
    }

    public function getById(int $id)
    {
        return Building::find($id);
    }

    public function getByNumber(string $number)
    {
        return Building::where('number', '=', $number)->get();
    }

    public function create(array $data)
    {

        $cityId = 0;
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
        $building = null;

        DB::transaction(function() use ($data, $cityId, &$building){
            $this->path = 'buildings';
            $instrumentImageName = $this->uploadingImage($data['instrument_image']);
            $buildingLicenseName = $this->uploadingImage($data['building_license_image']);
            $building =  Building::create([
                'name' => $data['name'],
                'city_id' => $cityId,
                'district' => $data['district'],
                'street' => $data['street'],
                'number' => $data['number'],
                'space' => $data['space'],
                'number_of_apartments' => $data['number_of_apartments'],
                'number_of_floors' => $data['number_of_floors'],
                'number_of_shops' => $data['number_of_shops'],
                'instrument_number' => $data['instrument_number'],
                'instrument_date_at' => $data['instrument_date_at'],
                'court' => $data['court'],
                'construction_license_number' => $data['construction_license_number'],
                'usage_type' => $data['usage_type'],
                'extra_details' => $data['extra_details'],
                'construction_license_date_at' => $data['construction_license_date_at'],
                'estate_type' => 'building',
                'rent_type' => $data['rent_type'],
                'price' => $data['price'],
                'is_active' => isset($data['is_active']) ?? false
            ]);
            $instrumentImage = Image::create([
                'imageable_type' => 'App\Building',
                'imageable_id' => $building->id,
                'name' => $instrumentImageName,
                'more' => 'instrument-image'
            ]);
            $buildingLicenseImage = Image::create([
                'imageable_type' => 'App\Building',
                'imageable_id' => $building->id,
                'name' => $buildingLicenseName,
                'more' => 'license-image'
            ]);
            $building->images()->save(
                $instrumentImage, $buildingLicenseImage
            );
            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $building->id,
                        'imageable_type' => 'App\Building'
                    ]);
                    $building->images()->save(
                        $image
                    );
                }
            }
        });
        return $building;
    }

    public function getWithImages($id){

        $building = $this->getById($id);
        if($building->images()->where('more', 'instrument-image')->first()){
            $instrument_image = $building->images()->where('more', 'instrument-image')->first()->name;
            $building->instrument_image = $instrument_image;
        }
        if($building->images()->where('more', 'license-image')->first()){
            $license_image = $building->images()->where('more', 'license-image')->first()->name;
            $building->license_image = $license_image;
        }
        return $building;
    }

    public function update(int $id, array $data)
    {

        $building = $this->getById($id);
        if(isset($data['city'])){
            $data['city_id'] = getModelId('City', 'name_en', $data['city']);
            unset($data['city']);
        }
        DB::transaction(function() use ($data, &$building){
            $this->path = 'buildings';

            $instrumentImage =$building->images()->where('more', 'instrument-image')->get();

            if($instrumentImage->isNotEmpty()){
                foreach ($instrumentImage as $instrumentImag){
                    $instrumentImag->delete();
                }
            }

            $licenseImage =$building->images()->where('more', 'license-image')->get();
            if($licenseImage->isNotEmpty()){
                foreach ($licenseImage as $licenseImag){
                    $licenseImag->delete();
                }
            }
            $buildingImage =$building->images()->where('more', 'building-image')->get();
            if($buildingImage->isNotEmpty()){
                foreach ($buildingImage as $buildingImag){
                    $buildingImag->delete();
                }
            }
            $instrumentImageName = $this->uploadingImage($data['instrument_image']);
            $buildingLicenseName = $this->uploadingImage($data['building_license_image']);


            $instrumentImage = Image::create([
                'imageable_type' => 'App\Building',
                'imageable_id' => $building->id,
                'name' => $instrumentImageName,
                'more' => 'instrument-image'
            ]);
            $buildingLicenseImage = Image::create([
                'imageable_type' => 'App\Building',
                'imageable_id' => $building->id,
                'name' => $buildingLicenseName,
                'more' => 'license-image'
            ]);
            $building->images()->save(
                $instrumentImage, $buildingLicenseImage
            );
            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $building->id,
                        'imageable_type' => 'App\Building'
                    ]);
                    $building->images()->save(
                        $image
                    );
                }
            }
//            $building->update($data);
            $building->update([
                'name' => $data['name'],
                'city_id' =>  $data['city_id'],
                'district' => $data['district'],
                'street' => $data['street'],
                'number' => $data['number'],
                'space' => $data['space'],
                'number_of_apartments' => $data['number_of_apartments'],
                'number_of_floors' => $data['number_of_floors'],
                'number_of_shops' => $data['number_of_shops'],
                'instrument_number' => $data['instrument_number'],
                'instrument_date_at' => $data['instrument_date_at'],
                'court' => $data['court'],
                'construction_license_number' => $data['construction_license_number'],
                'usage_type' => $data['usage_type'],
                'extra_details' => $data['extra_details'],
                'construction_license_date_at' => $data['construction_license_date_at'],
                'estate_type' => 'building',
                'rent_type' => $data['rent_type'],
                'price' => $data['price'],
                'is_active' => isset($data['is_active']) ?? false
            ]);
        });
        return $building;
    }

    public function getByIdWithTrashed(int $id)
    {
        Building::withTrashed()->find($id);
    }

    public function trashing(int $id)
    {
        // dd('fdfd');
        $building = $this->getById($id);
        Trash::create([
            'trashable_type' => 'App\Building',
            'trashable_id' => $id
        ]);
        if($building->apartments){
            $building->apartments()->delete();
        }
        if($building->shops){
            $building->shops()->delete();
        }
        $building->delete();
        return true;
    }

    public function trashes()
    {
        return Estate::where('estate_type', 'building')->withTrashed()->get();
    }

    public function delete(int $id)
    {
        $building = $this->getById($id);
        if($building->images()->where('instrument-image')->count()){
            $this->removeImage($building->images()->where('instrument-image')->first()->name);
            $building->images()->where('instrument-image')->delete();
        }
        if($building->images()->where('building-image')->count()){
            $this->removeImage($building->images()->where('building-image')->first()->name);
            $building->images()->where('building-image')->delete();
        }
        if($building->images()->where('license-image')->count()){
            $this->removeImage($building->images()->where('license-image')->first()->name);
            $building->images()->where('license-image')->delete();
        }
        if($building->apartments){
            $building->apartments()->forceDelete();
        }
        if($building->shops){
            $building->shops()->forceDelete();
        }
        $building->forceDelete();
        return true;
    }
}
