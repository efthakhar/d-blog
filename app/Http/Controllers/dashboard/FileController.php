<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    function upload(Request $request,FileService $fileService)
    {
        $url = $fileService->upload($request->file('upload')); 
        return response()->json(['uploaded'=> 1,'url' => $url ]); 
    }

    
}
