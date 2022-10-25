<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'category_name', 
        'category_slug', 
        'parent_category_id',
        'category_img_url',
        'category_description',
    ];

    public function  subcategories()
    {
        return $this->hasMany(self::class, 'parent_category_id','id');
    }
    public function  parentcat()
    {
        return $this->hasOne(Category::class, 'id', 'parent_category_id');
    }
}
