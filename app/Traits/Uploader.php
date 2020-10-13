<?php


namespace App\Traits;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


trait Uploader
{

    protected $path = null;

    private final function uploadingImage($image): string
    {
        $imageName = Str::random(8);

        if( is_file($image) ){
            $imageName .= '.' . $image->getClientOriginalExtension();
            $store=  Storage::putFileAs('images', $image, $imageName);
            $filename = $imageName; // renameing image
            $destinationPath =public_path('images');
            $image->move($destinationPath, $filename);

        }

//        $info = getimagesize($path);
//        $extension = image_type_to_extension($info[2]);

        return $imageName;
    }

    private final function removeImage($imageName)
    {
        if(Storage::exists('/images/' . $imageName)){
            Storage::delete( '/images/' . $imageName);
        }
    }

    private final function uploadingDocument($document): string
    {
        $documentName = Str::random(8);

        if( is_file($documentName) ){
            $documentName .= '.' . $document->getClientOriginalExtension();
            Storage::putFileAs('documents', $document, $documentName);
        }

//        $info = getimagesize($path);
//        $extension = image_type_to_extension($info[2]);

        return $documentName;
    }


}
