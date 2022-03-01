<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ProductController@getAllProducts')->name('getAllProducts');

Route::prefix('product')->group(
    function () {
        Route::get('/addForm', 'ProductController@addForm')->name('addForm');
        Route::get('/updateForm', 'ProductController@updateForm')->name('updateForm');
        Route::get('/deleteForm', 'ProductController@deleteForm')->name('deleteForm');
        Route::post('/store', 'ProductController@storeProduct')->name('store');
        Route::post('/update', 'ProductController@updateProduct')->name('update');
        Route::post('/deleteById', 'ProductController@deleteById')->name('deleteById');
    }
);
