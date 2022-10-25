<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
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
}
