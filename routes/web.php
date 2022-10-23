<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.overview');
});

Route::get('/dashboard/help', function () {
    return view('dashboard.help');
});