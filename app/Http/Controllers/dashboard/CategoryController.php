<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
      $categories = Category::paginate(10);
      return view('dashboard.category.list',['categories'=>$categories]);
    }

    function list()
    {
    
     return  Category::select('id','category_name')
                    ->orderBy("category_name", "asc")->get();
    }

    
    function create()
    {
        $categories = $this->list();
        return  view('dashboard.category.create',['categories'=>$categories]);
    }

    function store(Request $request)
    {
        // Category::truncate();
        // dd();
        $validatedData = $request->validate([
          'category_name' => 'required|unique:categories|max:255',
          'category_slug' => 'unique:categories|max:255',      
        ]);
        
        $slug = $request->category_slug?
        strtolower(str_replace(' ','-',$request->category_slug))
        :strtolower(str_replace(' ','-',$request->category_name));

        $category_img = $request->file('category_img');

        if($category_img){

          $img_name = time().$category_img->getClientOriginalName();
          $path = $category_img->storeAs('uploads',$img_name,'public');
          $category_img_url = "/storage/{$path}";

        }
        


        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $slug;
        $category->parent_category_id = $request->parent_category_id;
        $category->category_description = $request->category_description;
        $category->category_img_url = $category_img? $category_img_url:'';

        $category->save();

        return redirect('/dashboard/categories');
              //  ->with('status', 'category created successfully')
              //  ->with('category_img_url', $category->category_img_url);

    }
}
