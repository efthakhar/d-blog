<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index(Request $request)
    {
      $q = $request->query('q');

      $tags = Tag::when($q, function($query,$q){
        $query->where('tag_name',"LIKE",'%'.$q.'%');
      })
      ->orderby('id','desc')->paginate(10) ->appends(request()->query());
      
      return view('dashboard.tag.list',['tags'=>$tags]);

    }

    function show($id)
    {
       $tag = Tag::find($id);
       return view('dashboard.tag.show',['tag'=>$tag]);
    }

    function create()
    {           
        return  view('dashboard.tag.create');
    }

    function store(Request $request)
    {
        
        $validatedData = $request->validate([
          'tag_name' => 'required|unique:tags|max:25',
          'tag_slug' => 'unique:tags|max:25',      
        ]);
        
        $slug = $request->tag_slug ? 
        strtolower(str_replace(' ','-',$request->tag_slug))
        :strtolower(str_replace(' ','-',$request->tag_name));

        $tag = new Tag();
        $tag->tag_name = $request->tag_name;
        $tag->tag_slug = $slug;
        $tag->tag_description = $request->tag_description;

        $tag->save();
        return redirect('/dashboard/tags/create');
             

    }

    function edit(Request $request,$id)
    {
        $tag = Tag::find($id);
        return view('dashboard.tag.edit',['tag' => $tag]);
    }

    function update(Request $request, $id)
    {
      
        $validatedData = $request->validate([
          'tag_name' => 'required|unique:tags,tag_name,'.$id.'|max:25',
          'tag_slug' => 'unique:tags,tag_slug,'.$id.'|max:25',      
        ]);

        Tag::where('id',$id)
            ->update([
              'tag_name' => $request->tag_name,
              'tag_slug' => $request->tag_slug,
              'tag_description' => $request->tag_description,   
            ]);

        return redirect()->route('tag.edit',['id'=>$id])
              ->with('tag_update_status', 'successfully updated tag');
    }

    public function delete($tag_id)
    {
        Tag::destroy($tag_id);
      
    }
}
