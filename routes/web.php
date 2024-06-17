<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Users
Route::get('admin/users', 'App\Http\Controllers\UserController@read')->name('user@read');
Route::get('admin/users/new', 'App\Http\Controllers\UserController@create')->name('user@create');
Route::post('admin/users/create', 'App\Http\Controllers\UserController@store')->name('user@store');
Route::get('admin/users/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user@edit');
Route::put('admin/users/{id}/update', 'App\Http\Controllers\UserController@update')->name('user@update');
Route::get('admin/users/{id}/delete', 'App\Http\Controllers\UserController@destroy')->name('user@destroy');

// Posts
Route::get('admin/posts', 'App\Http\Controllers\PostController@read')->name('post@read');
Route::get('admin/posts/new', 'App\Http\Controllers\PostController@create')->name('post@create');
Route::post('admin/posts/create', 'App\Http\Controllers\PostController@store')->name('post@store');
Route::get('admin/posts/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('post@edit');
Route::put('admin/posts/{id}/update', 'App\Http\Controllers\PostController@update')->name('post@update');
Route::get('admin/posts/{id}/delete', 'App\Http\Controllers\PostController@destroy')->name('post@destroy');

// Comments
Route::get('admin/comments', 'App\Http\Controllers\CommentController@read')->name('comment@read');
Route::get('admin/comments/new', 'App\Http\Controllers\CommentController@create')->name('comment@create');
Route::post('admin/comments/create', 'App\Http\Controllers\CommentController@store')->name('comment@store');
Route::get('admin/comments/{id}/edit', 'App\Http\Controllers\CommentController@edit')->name('comment@edit');
Route::put('admin/comments/{id}/update', 'App\Http\Controllers\CommentController@update')->name('comment@update');
Route::get('admin/comments/{id}/delete', 'App\Http\Controllers\CommentController@destroy')->name('comment@destroy');

// Likes
Route::get('admin/likes', 'App\Http\Controllers\LikeController@read')->name('like@read');
Route::get('admin/likes/new', 'App\Http\Controllers\LikeController@create')->name('like@create');
Route::post('admin/likes/create', 'App\Http\Controllers\LikeController@store')->name('like@store');
Route::get('admin/likes/{id}/edit', 'App\Http\Controllers\LikeController@edit')->name('like@edit');
Route::put('admin/likes/{id}/update', 'App\Http\Controllers\LikeController@update')->name('like@update');
Route::get('admin/likes/{id}/delete', 'App\Http\Controllers\LikeController@destroy')->name('like@destroy');
