<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\TagController;
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
    // category routes for dashboard
    Route::get('/dashboard/categories',[CategoryController::class,'index'])->name('category.index');
    Route::get('/categories/list',[CategoryController::class,'list'])->name('category.list');
    Route::get('/dashboard/categories/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/dashboard/categories',[CategoryController::class,'store'])->name('category.save');;
    Route::get('/dashboard/categories/{id}',[CategoryController::class,'show'])->name('category.show');
    Route::get('/dashboard/categories/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/dashboard/categories/{id}/update',[CategoryController::class,'update'])->name('category.update');
    Route::delete('/dashboard/categories/{id}',[CategoryController::class,'delete']);

    // tag routes for dashboard
    Route::get('/dashboard/tags',[TagController::class,'index'])->name('tag.index');
    Route::get('/dashboard/tags/create',[TagController::class,'create'])->name('tag.create');
    Route::post('/dashboard/tags',[TagController::class,'store'])->name('tag.store');
    Route::get('/dashboard/tags/{id}',[TagController::class,'show'])->name('tag.show');
    Route::get('/dashboard/tags/{id}/edit',[TagController::class,'edit'])->name('tag.edit');
    Route::put('/dashboard/tags/{id}/update',[TagController::class,'update'])->name('tag.update');
    Route::delete('/dashboard/tags/{id}',[TagController::class,'delete'])->name('tag.delete');
    
});

