<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class  CategoryService{

    function __construct()
    {
        
    }

    function getAllCatWithSubcat()
    {
        $categories =  Category::where("parent_category_id", null)
                      ->get()->keyBy('id');

        foreach($categories as $category)
        {
            $childs = $this->Childs($category->id);
            $categories[$category->id]['subcats'] = $childs;
          
        }
    
         return $categories;       
    }

    function Childs($id)
    {
       $categories = Category::where("parent_category_id", $id)
                     ->get()->keyBy('id');

       foreach($categories as $category)
       {
           $childs = $this->Childs($category->id);
           $categories[$category->id]['subcats'] = $childs;   
       }
       
       return $categories ;
    }

}


