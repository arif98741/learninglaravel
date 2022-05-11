 <?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');

