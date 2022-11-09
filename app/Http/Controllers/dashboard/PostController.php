<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Services\FileService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function index()
    {     
        //DB::enableQueryLog();
        $posts = Post::with('categories')
                ->with('tags')
                ->orderby('id','desc')
                ->paginate(5) ;  
              
        return view('dashboard.post.list',['posts'=>$posts]);
    }

    function create(CategoryService $categoryService)
    {      
        $categories = $categoryService->getAllCatWithSubcat();
        $tags = Tag::all();
        return  view('dashboard.post.create',['categories'=> $categories,'tags'=>$tags]);
    }

    function store(Request $request, FileService $fileService)
    {
       // dd($request->tags);
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts|max:255',      
        ]);

        $slug = $request->slug ? 
        strtolower(str_replace(' ','-',$request->slug))
        :strtolower(str_replace(' ','-',$request->title));



        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->featured = $request->featured ? 1:0;
        $post->breaking = $request->breaking ? 1:0;
       
        if($request->file('post_thumbnail'))
        {
           $post_thumbnail_url = $fileService->upload($request->post_thumbnail);
           $post->post_thumbnail_url = $post_thumbnail_url ;
        }
       
        $post->save();

        $categories = $request->categories;
        $tags = $request->tags;
        
        if($categories)
        {
            foreach($categories as $cat)
            {
                DB::table('category_post')->insert([
                    'cat_id' => $cat,
                    'post_id'=> $post->id,
                ]);
            }

        }
        if($tags)
        {
            foreach($tags as $tag)
            {
                DB::table('post_tag')->insert([
                    'tag_id' => $tag,
                    'post_id'=> $post->id,
                ]);
            }

        }
        
        return redirect('/dashboard/posts');

    }

    public function delete($id)
    {
        Post::destroy($id);
        DB::table('category_post')
        ->where('post_id',$id)
        ->delete();
    }

}
