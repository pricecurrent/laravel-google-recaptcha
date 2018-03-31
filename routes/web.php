<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::post('posts', 'PostsController@store')->name('posts.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
