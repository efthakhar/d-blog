<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function index()
    {     
        $posts = Post::with('comments')->get();     
    }

    function create()
    {      
        return  view('dashboard.post.create');
    }

    function store(Request $request, FileService $fileService)
    {
        //dd($request->content);
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts|max:255',      
        ]);

        $slug = $request->slug ? 
        strtolower(str_replace(' ','-',$request->slug))
        :strtolower(str_replace(' ','-',$request->title));

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->featured = $request->featured ? 1:0;
        $post->breaking = $request->breaking ? 1:0;
       
        if($request->file('post_thumbnail'))
        {
           // dd($request->post_thumbnail);
           $post_thumbnail_url = $fileService->upload($request->post_thumbnail);
           $post->post_thumbnail_url = $post_thumbnail_url ;

        }
       

        $post->save();
        //return redirect('/dashboard/posts');
    }
}
