<?php

use Illuminate\Database\Seeder;

class ClearStorage extends Seeder
{

    public function run()
    {
        foreach(\Illuminate\Support\Facades\Storage::allFiles('images') as $image)
            \Illuminate\Support\Facades\Storage::delete($image);

        foreach(\Illuminate\Support\Facades\Storage::allFiles('documents') as $image)
            \Illuminate\Support\Facades\Storage::delete($image);
    }
}
