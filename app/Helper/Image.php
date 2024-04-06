<?php
namespace App\Helper;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Image
{
    public static function Image($table,$image)
    {
        if ($image){
            $name = $image->hashName();
            $manager = new ImageManager(new Driver());
            $small = $manager->read($image->getRealPath());
            $big = $manager->read($image->getRealPath());
            $small->resize(250,250);

            Storage::disk('image')->put($table.'/small/'.$name, (string) $small->toPng());
            Storage::disk('image')->put($table.'/big/'.$name, (string) $big->toPng());
            return $name;
        }else{
            return '';
        }
    }
}
