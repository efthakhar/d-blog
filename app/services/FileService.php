<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class FileService{

    function __construct()
    {
        
    }

    function upload($file)
    {
        // dd($file);

        //  $document->getRealPath();
        //  $document->getClientOriginalName();
        //  $document->getClientOriginalExtension();
        //  $document->getSize();
        //  $document->getMimeType();

       
        $file_name = time().$file->getClientOriginalName();
        $type = $file->getMimeType();
        $size = $file->getSize();
        $path = $file->storeAs('uploads', $file_name,'public');

        DB::table('files')->insertGetId([
            'file_name'=>$file_name,
            'file_path'=>$path,
            'file_type'=>$type,
            'size'=>$size,
            
        ]);

        return $img_url = "/storage/{$path}";
    }

}


// Array
// (
//     [width] => 1920
//     [height] => 1643
//     [file] => 2014/01/sitelargeblah.png
//     [sizes] => Array
//         (
//             [thumbnail] => Array
//                 (
//                     [file] => sitelargeblah-175x150.png
//                     [width] => 175
//                     [height] => 150
//                     [mime-type] => image/png
//                 )

//             [medium] => Array
//                 (
//                     [file] => sitelargeblah-300x256.png
//                     [width] => 300
//                     [height] => 256
//                     [mime-type] => image/png
//                 )

//             [large] => Array
//                 (
//                     [file] => sitelargeblah-1024x876.png
//                     [width] => 1024
//                     [height] => 876
//                     [mime-type] => image/png
//                 )

//             [post-thumbnail] => Array
//                 (
//                     [file] => sitelargeblah-604x270.png
//                     [width] => 604
//                     [height] => 270
//                     [mime-type] => image/png
//                 )

//         )

//     [image_meta] => Array
//         (
//             [aperture] => 0
//             [credit] => 
//             [camera] => 
//             [caption] => 
//             [created_timestamp] => 0
//             [copyright] => 
//             [focal_length] => 0
//             [iso] => 0
//             [shutter_speed] => 0
//             [title] => 
//         )

// )