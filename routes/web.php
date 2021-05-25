<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::resource('/blog', 'Admin\BlogController');
});

//Auth::routes();

