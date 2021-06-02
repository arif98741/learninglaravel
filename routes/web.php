<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');

    Route::resource('/blog', 'Admin\BlogController');
});

//Auth::routes();

