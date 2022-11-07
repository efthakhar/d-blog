<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    function comments()
    {
       return $this->hasMany(Comment::class);
    }
}
