<?php

use App\Http\Controllers\dashboard\CategoryController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/dashboard');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.overview');
});

Route::get('/dashboard/help', function () {
    return view('dashboard.help');
});

Route::group(['namespace' => 'dashboard'], function(){
    
    Route::get('/dashboard/categories',[CategoryController::class,'index'])->name('category.index');
    Route::get('/categories/list',[CategoryController::class,'list'])->name('category.list');

    Route::get('/dashboard/categories/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/dashboard/categories',[CategoryController::class,'store'])->name('category.save');;

     Route::get('/dashboard/categories/{id}',[CategoryController::class,'show'])->name('category.show');

    Route::get('/dashboard/categories/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/dashboard/categories/{id}/update',[CategoryController::class,'update'])->name('category.update');

    Route::delete('/dashboard/categories/{id}',[CategoryController::class,'delete']);
    
});

