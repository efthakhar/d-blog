<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    function comments()
    {
       return $this->hasMany(Comment::class);
    }
    function categories()
    {
       return $this->belongsToMany(Category::class,'category_post','post_id','cat_id');
    }
    function tags()
    {
       return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }

    
    
}
