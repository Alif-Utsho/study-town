<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    public static function upload(UploadedFile $file, $folder = 'uploads')
    {
        // Create a unique filename
        $filename = time() . '_' . $file->getClientOriginalName();

        // Define the path where the image will be stored
        $directory = "uploads/$folder";
        $path = public_path($directory);

        // Make sure the directory exists
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Move the file to the defined path
        $file->move($path, $filename);

        // Return the relative path to the image
        return "$directory/$filename";
    }
}
