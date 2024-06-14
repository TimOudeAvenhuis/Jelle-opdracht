<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Users
Route::get('/users', 'App\Http\Controllers\UserController@read')->name('user@read');
Route::get('/users/new', 'App\Http\Controllers\UserController@create')->name('user@create');
Route::post('/users/create', 'App\Http\Controllers\UserController@store')->name('user@store');
Route::get('/users/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user@edit');
Route::put('/users/{id}/update', 'App\Http\Controllers\UserController@update')->name('user@update');
Route::get('/users/{id}/delete', 'App\Http\Controllers\UserController@destroy')->name('user@destroy');

// Posts
Route::get('/posts', 'App\Http\Controllers\PostController@read')->name('post@read');
Route::get('/posts/new', 'App\Http\Controllers\PostController@create')->name('post@create');
Route::post('/posts/create', 'App\Http\Controllers\PostController@store')->name('post@store');
Route::get('/posts/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('post@edit');
Route::put('/posts/{id}/update', 'App\Http\Controllers\PostController@update')->name('post@update');
Route::get('/posts/{id}/delete', 'App\Http\Controllers\PostController@destroy')->name('post@destroy');

// Comments
Route::get('/comments', 'App\Http\Controllers\CommentController@read')->name('comment@read');
Route::get('/comments/new', 'App\Http\Controllers\CommentController@create')->name('comment@create');