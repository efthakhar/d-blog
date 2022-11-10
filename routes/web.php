<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\FileController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\TagController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/dashboard');
    // return view('welcome');
});




//Auth
Route::get('/register',[AuthController::class,'registerPage'])->name('auth.register');
Route::post('/register',[AuthController::class,'registerUser']);
Route::get('/login',[AuthController::class,'loginPage'])->name('auth.login');
Route::post('/login',[AuthController::class,'loginUser'])->name('auth.login');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');

Route::group([
    'namespace' => 'dashboard',
    'middleware' => ['authentication']
], function(){

    Route::get('/dashboard', function () {
        return view('dashboard.overview');
    });

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

    // Posts routes for dashboard
    Route::get('/dashboard/posts',[PostController::class,'index'])->name('post.index');
    Route::get('/dashboard/posts/create',[PostController::class,'create'])->name('post.create');
    Route::post('/dashboard/posts',[PostController::class,'store'])->name('post.store');
    Route::get('/dashboard/posts/{id}',[PostController::class,'show'])->name('post.show');
    Route::get('/dashboard/posts/{id}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/dashboard/posts/{id}/update',[PostController::class,'update'])->name('post.update');
    Route::delete('/dashboard/posts/{id}',[PostController::class,'delete'])->name('post.delete');

    // files
    Route::post('/files/upload',[FileController::class,'upload'])->name('file.store');
    Route::get('/files/delete/{id}',[FileController::class,'delete'])->name('file.delete');
    Route::get('dashboard/files/',[FileController::class,'list'])->name('file.list');

    
    
});

