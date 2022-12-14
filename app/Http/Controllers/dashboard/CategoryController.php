<?php

namespace App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Services\FileService;

use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    function index(Request $request)
    {
      $q = $request->query('q');

      $categories = 
      Category::when($q, function($query,$q){
        $query->where('category_name',"LIKE",'%'.$q.'%');
      })
      ->orderby('id','desc')
      ->paginate(10) 
      ->appends(request()->query());

      return view('dashboard.category.list',['categories'=>$categories]);
    }

    function list()
    {  
      return  Category::select('id','category_name')
                        ->orderBy("category_name", "asc")
                        ->get()
                        ->keyBy('id');
    }

    
    function create()
    {      
        $categories = $this->list();
        return  view('dashboard.category.create',['categories'=>$categories]);
    }


    function store(Request $request,FileService $fileservice)
    {
        
        $validatedData = $request->validate([
          'category_name' => 'required|unique:categories|max:255',
          'category_slug' => 'unique:categories|max:255',      
        ]);
        
        $slug = $request->category_slug?
        strtolower(str_replace(' ','-',$request->category_slug))
        :strtolower(str_replace(' ','-',$request->category_name));

        $category_img = $request->file('category_img');

        if($category_img)
        {         
          $category_img_url = $fileservice->upload($category_img);
        }
        

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $slug;
        $category->parent_category_id = $request->parent_category_id;
        $category->category_description = $request->category_description;
        $category->category_img_url = $category_img ? $category_img_url:'';

        $category->save();

        return redirect('/dashboard/categories');
             

    }

    function show($id)
    {
        $category = Category::find($id);
        return view('dashboard.category.show',['category'=> $category]);
    }

    function edit($id)
    {
        $category = Category::find($id);
        $categories = $this->list();
        unset($categories[$id]);
        return view('dashboard.category.edit',['category'=> $category,'categories'=>$categories]);
    }

    function update(Request $request,FileService $fileservice, $id)
    {
        
        $validatedData = $request->validate([
          'category_name' => 'required|unique:categories,category_name,'.$id.'|max:255',
          'category_slug' => 'unique:categories,category_slug,'.$id.'|max:255',      
        ]);

        $slug = $request->category_slug?
        strtolower(str_replace(' ','-',$request->category_slug))
        :strtolower(str_replace(' ','-',$request->category_name));

        $category_img = $request->file('category_img');

        if($category_img){

          $category_img_url = $fileservice->upload($category_img);

        }

        Category::where('id',$id)
        ->update([
          'category_name' => $request->category_name,
          'category_slug' => $slug,
          'parent_category_id' => $request->parent_category_id,
          'category_description' => $request->category_description,
          'category_img_url' => $category_img? $category_img_url:''
        ]);

        return redirect()->route('category.edit',['id'=>$id])
              ->with('category_update_status', 'successfully updated category');
    }

    public function delete($cat_id)
    {
        Category::destroy($cat_id);
      
    }


}
