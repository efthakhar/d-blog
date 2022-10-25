<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function create()
    {           
        return  view('dashboard.tag.create');
    }
}
