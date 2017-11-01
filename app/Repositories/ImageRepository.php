<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 01/11/2017
 * Time: 11:20
 */

namespace App\Repositories;


use Illuminate\Support\Facades\File;
use Image;

class ImageRepository
{
    public function saveImage($image, $id, string $folder, int $size)
    {
        $extension = $image->getClientOriginalExtension();
        $fileName = time() . random_int(100, 999) . '.' . $extension;

        $destinationPath = public_path("uploads/{$folder}/{$id}/");
        $fullPath = $destinationPath . $fileName;

        if (!file_exists($destinationPath) && !is_dir($destinationPath)) {
           File::makeDirectory($destinationPath, 0775, true);
        }

        $newImage = Image::make($image->getRealPath())->resize($size, null, function($constrait){
            $constrait->aspectRatio();
        })->encode('jpg');
        $newImage->save($fullPath, 100);

        return "/uploads/{$folder}/{$id}/$fileName";
    }

    public function checkImageAndRemove(string $fullPath)
    {
        if (file_exists($fullPath) && !is_dir($fullPath)) {
            unlink($fullPath);
        }
    }
}