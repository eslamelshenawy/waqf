<?php


namespace App\Repositories\Estate\Land;
use App\Image;
use App\Land;
use App\Estate;
use App\Traits\Uploader;
use Illuminate\Support\Facades\DB;

class LandRepository implements LandRepositoryInterface
{
    use Uploader;

    public function all()
    {
        return Land::all();
    }

    public function getById(int $id)
    {
        return Land::find($id);
    }

    public function create(array $data)
    {
        $land = null;
        DB::transaction(function() use ($data, &$land){
            $land = Land::create([
                'number' => $data['number'],
                'location' => $data['location'],
                'space' => $data['space'],
                'price' => $data['price'],
                'instrument_number' => $data['instrument_number'],
                'instrument_date_at' => $data['instrument_date_at'],
                'court' => $data['court'],
                'city_id' => getModelId('City', 'name_en', $data['city']),
                'usage_type' => $data['land_type'],
                'estate_type' => 'land',
                'extra_details' => isset($data['extra_details']) ? $data['extra_details'] : null,
                'district' => $data['district'],
                'street' => $data['street'],
                'is_active' => isset($data['is_active']) ?? false
            ]);

            $this->path = 'lands';

            if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
                for($i=0; $i<count($data['images']); $i++){
                    $imageName = $this->uploadingImage($data['images'][$i]);
                    $image = Image::create([
                        'name' => $imageName,
                        'imageable_id' => $land->id,
                        'imageable_type' => 'App\Land',
                    ]);
                    $land->images()->save(
                        $image
                    );
                }
            }
        });
    }

    public function update(int $id, array $data)
    {
        $land  = $this->getById($id);
        
        if(($data['images'][0]) != null){
           
        if($land->images()->get()->isNotEmpty()){
            
            foreach ($land->images()->get() as $landimage){
                $landimage->delete();
            }
        }
        
        if( $data['images'] && is_array($data['images']) && count($data['images']) > 0 ){
            for($i=0; $i<count($data['images']); $i++){
                $imageName = $this->uploadingImage($data['images'][$i]);
                $image = Image::create([
                    'name' => $imageName,
                    'imageable_id' => $land->id,
                    'imageable_type' => 'App\Land',
                ]);
                $land->images()->save(
                    $image
                );
            }
        }
        
        }
        
        $land->update([
            'number' => $data['number'],
            'location' => $data['location'],
            'space' => $data['space'],
            'price' => $data['price'],
            'instrument_number' => $data['instrument_number'],
            'instrument_date_at' => $data['instrument_date_at'],
            'court' => $data['court'],
            'city_id' => getModelId('City', 'name_en', $data['city']),
            'usage_type' => $data['land_type'],
            'estate_type' => 'land',
            'extra_details' => isset($data['extra_details']) ? $data['extra_details'] : null,
            'district' => $data['district'],
            'street' => $data['street'],
            'is_active' => isset($data['is_active']) ?? false
        ]);

    }

    public function remove(int $id)
    {
        
    }

    public function erase(int $id)
    {
        // TODO: Implement erase() method.
    }

    public function activate(int $id)
    {
        // TODO: Implement activate() method.
    }

    public function deactivate(int $id)
    {
        // TODO: Implement deactivate() method.
    }

    public function trash(int $id)
    {
        return Land::destroy($id);
    }
}
