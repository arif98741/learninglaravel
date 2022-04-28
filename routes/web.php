<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    phpinfo();
});


Route::get('hello', function(){
    return 'hello';
});



