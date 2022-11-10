<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    
    function upload(Request $request,FileService $fileService)
    {
        $url = $fileService->upload($request->file('upload')); 
        return response()->json(['uploaded'=> 1,'url' => $url ]); 
    }
    function delete($id)
    {
        $file = File::find($id);
        
        File::destroy($id);

        if(file_exists('storage/'.$file->file_path))
        {
            unlink('storage/'.$file->file_path);
        }
        
        return back()->with([
                    'success' => 'file deleted',
             ]);
    }
    function list()
    {
        $files = File::orderBy('id','desc')->paginate(5);
        return view('dashboard.file.list',['files'=>$files]);
    }

    
}
